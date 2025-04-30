<?php

namespace App\Policies;

use App\Models\ChatSession;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChatSessionPolicy
{
    use HandlesAuthorization;

    public function view(User $user, ChatSession $chatSession): bool
    {
        return $user->id === $chatSession->user_id;
    }

    public function manage(User $user, ChatSession $chatSession): bool
    {
        return $user->id === $chatSession->user_id;
    }
}