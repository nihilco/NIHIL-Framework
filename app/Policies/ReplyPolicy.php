<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Reply;

class ReplyPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Reply $reply)
    {
        return $reply->user_id === $user->id;
    }

    public function delete(User $user, Reply $reply)
    {
        return $reply->user_id === $user->id;
    }
}