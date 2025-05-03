<?php

namespace App\Jobs;

use App\Models\ChatMessage;
use App\Models\ChatSession;
use Exception;
use Illuminate\Support\Facades\Http;      
use Illuminate\Support\Facades\Log; 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessOpenAIMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $backoff = [5, 15, 30]; // Retry after 5, 15, then 30 seconds
    
    protected $session;
    protected $message;

    public function __construct(ChatSession $session, ChatMessage $message)
    {
        $this->session = $session;
        $this->message = $message;
    }

    public function handle(): void
    {
        try {
            // build the history array
            $messages = $this->formatChatHistory();

            $response = Http::withToken(config('services.openai.api_key'))
                ->post('https://api.openai.com/v1/chat/completions', [
                    'model'      => config('services.openai.model', 'gpt-4o'),
                    'messages'   => $messages,
                    'max_tokens' => 4000,
                    'temperature'=> 0.7,
                ]);

            if ($response->failed()) {
                throw new Exception('OpenAI API error: ' . $response->body());
            }

            $aiContent = $response->json('choices.0.message.content');

            ChatMessage::create([
                'chat_session_id' => $this->session->id,
                'sender'          => 'ai',
                'content'         => $aiContent,
                'format' => 'markdown' 
            ]);

            $this->session->update([
                'status'        => 'ready',
                'error_context' => null,
            ]);

        } catch (Exception $e) {
            Log::error('OpenAI processing failed: ' . $e->getMessage(), [
                'session_id' => $this->session->id,
                'message_id' => $this->message->id,
            ]);

            $this->session->update([
                'status'        => 'error',
                'error_context' => $e->getMessage(),
            ]);

            if ($this->attempts() < $this->tries) {
                throw $e;
            }
        }
    }

    protected function formatChatHistory(): array
    {
        // System message to set context
        $subject = $this->session->subject;
        
        $messages = [
            [
                'role' => 'system',
                'content' => "You are an expert study assistant for the subject: {$subject->name}. 
                             Provide helpful, accurate, and educational responses. Focus on explaining
                             concepts clearly and providing examples where appropriate. Write only in Croatian.
                             Do not include any disclaimers or unnecessary information."
            ]
        ];

        // Get all previous messages in order
        $chatMessages = $this->session->messages()
            ->orderBy('created_at', 'asc')
            ->get();

        foreach ($chatMessages as $msg) {
            $role = $msg->sender === 'user' ? 'user' : 'assistant';
            $messages[] = [
                'role' => $role,
                'content' => $msg->content
            ];
        }

        return $messages;
    }
}