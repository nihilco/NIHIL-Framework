<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Thread;

class ThreadPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function update(User $user, Thread $thread)
    {
        return $thread->user_id === $user->id;
    }

    public function delete(User $user, Thread $thread)
    {
        return $thread->user_id === $user->id;
    }
}