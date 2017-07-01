<?php

namespace NIHILCo\Forums\Policies;

use App\User;
use NIHILCo\Forums\Models\Forum;
use Illuminate\Auth\Access\HandlesAuthorization;

class ForumPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function update(User $user, Forum $forum)
    {
        return $forum->user_id === $user->id;
    }
}