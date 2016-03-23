<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Conversation;

class ConversationPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Conversation $conversation)
    {
        return $user->id === $conversation->user_id;
    }
}
