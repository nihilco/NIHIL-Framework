<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Forum;

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

    public function delete(User $user, Forum $forum)
    {
        return $forum->user_id === $user->id;
    }
}