<?php

namespace App\Policies;

use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChatMessagePolicy
{
    use HandlesAuthorization;

    public function edit(User $user, ChatMessage $chatMessage): bool
    {
        // Only allow editing user messages that belong to the user's sessions
        return $chatMessage->sender === 'user' && 
               $user->id === $chatMessage->chatSession->user_id;
    }
}