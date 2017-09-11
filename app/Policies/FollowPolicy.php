<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Follow;

class FollowPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function update(User $user, Follow $follow)
    {
        return $follow->user_id === $user->id;
    }

    public function delete(User $user, Follow $follow)
    {
        return $follow->user_id === $user->id;
    }
}