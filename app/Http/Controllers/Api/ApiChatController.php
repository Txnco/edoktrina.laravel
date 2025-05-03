<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;   
use Illuminate\Http\Request;
use App\Models\ChatSession;
use App\Models\ChatMessage;
use App\Jobs\ProcessOpenAIMessage;
use Carbon\Carbon;

class ApiChatController extends Controller
{
    use AuthorizesRequests;

    public function sendMessage(Request $request)
    {
        $data = $request->validate([
            'session_id' => 'required|exists:chat_sessions,id',
            'content'    => 'required|string',
        ]);

        $session = ChatSession::findOrFail($data['session_id']);

        // this will now have a real $request->user()
        $this->authorize('manage', $session);

        $userMessage = ChatMessage::create([
            'chat_session_id' => $session->id,
            'sender'          => 'user',
            'content'         => $data['content'],
            'format' => 'markdown' 
        ]);

        $session->update(['status' => 'busy']);
        ProcessOpenAIMessage::dispatch($session, $userMessage);

        return response()->json([
            'message'        => $userMessage,
            'session_status' => 'busy',
        ]);
    }

    public function editMessage(Request $request, ChatMessage $message)
    {
        $this->authorize('edit', $message);
        
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $session = $message->chatSession;
        
        // Check if session is busy
        if ($session->status === 'busy') {
            return response()->json([
                'error' => 'Cannot edit message while session is busy'
            ], 429);
        }

        // Update the message
        $message->update([
            'content' => $validated['content'],
            'edited_flag' => true,
        ]);

        // Delete all AI messages that came after this one
        $cutoffDate = $message->created_at;
        
        ChatMessage::where('chat_session_id', $session->id)
            ->where('sender', 'ai')
            ->where('created_at', '>', $cutoffDate)
            ->delete();

        // Re-process with OpenAI
        $session->update(['status' => 'busy']);
        ProcessOpenAIMessage::dispatch($session, $message);

        return response()->json([
            'message' => $message,
            'session_status' => 'busy'
        ]);
    }

    public function retryProcessing(ChatSession $session)
    {
        $this->authorize('manage', $session);
        
        // Find the last user message
        $lastUserMessage = ChatMessage::where('chat_session_id', $session->id)
            ->where('sender', 'user')
            ->orderBy('created_at', 'desc')
            ->first();
            
        if (!$lastUserMessage) {
            return response()->json([
                'error' => 'No messages to retry'
            ], 400);
        }

        // Mark session as busy
        $session->update([
            'status' => 'busy',
            'error_context' => null
        ]);

        // Dispatch job to process with OpenAI
        ProcessOpenAIMessage::dispatch($session, $lastUserMessage);

        return response()->json([
            'session_status' => 'busy'
        ]);
    }

    public function restartProcessing(ChatSession $session)
    {
        $this->authorize('manage', $session);
        
        // Find the last user message
        $lastUserMessage = ChatMessage::where('chat_session_id', $session->id)
            ->where('sender', 'user')
            ->orderBy('created_at', 'desc')
            ->first();
            
        if (!$lastUserMessage) {
            return response()->json([
                'error' => 'No messages to restart'
            ], 400);
        }

        // Delete the last AI response if exists
        ChatMessage::where('chat_session_id', $session->id)
            ->where('sender', 'ai')
            ->where('created_at', '>', $lastUserMessage->created_at)
            ->delete();

        // Mark session as busy
        $session->update([
            'status' => 'busy',
            'error_context' => null
        ]);

        // Dispatch job to process with OpenAI
        ProcessOpenAIMessage::dispatch($session, $lastUserMessage);

        return response()->json([
            'session_status' => 'busy'
        ]);
    }

    public function getSessionStatus(ChatSession $session)
    {
        $this->authorize('manage', $session);
        
        $lastAiMessage = ChatMessage::where('chat_session_id', $session->id)
            ->where('sender', 'ai')
            ->orderBy('created_at', 'desc')
            ->first();
        
        return response()->json([
            'status' => $session->status,
            'error_context' => $session->error_context,
            'has_new_messages' => $lastAiMessage ? true : false
        ]);
    }

    public function getMessages(ChatSession $session, Request $request)
    {
        $after = $request->query('after');
        $since = Carbon::createFromTimestampMs((int) $after);

        $messages = $session
            ->messages()
            ->where('created_at', '>', $since)
            ->orderBy('created_at')
            ->get();

        return response()->json([
            'messages' => $messages,
        ]);
    }
}