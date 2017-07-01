<?php

namespace NIHILCo\Forums\Policies;

use App\User;
use NIHILCo\Forums\Models\Thread;
use Illuminate\Auth\Access\HandlesAuthorization;

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
}