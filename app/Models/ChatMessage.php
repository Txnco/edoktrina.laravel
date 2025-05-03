<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = ['chat_session_id', 'sender', 'content', 'edited_flag'];

    public function chatSession(): BelongsTo
    {
        return $this->belongsTo(ChatSession::class);
    }

    protected $casts = [
        'format' => 'string',
    ];

    // Returns a safe, formatted HTML version of content
    public function getHtmlContentAttribute(): string
    {
        if ($this->format === 'markdown') {
            // uses league/commonmark under the hood
            return Str::markdown($this->content);
        }

        // plain text → escape and preserve line breaks
        return nl2br(e($this->content));
    }
}