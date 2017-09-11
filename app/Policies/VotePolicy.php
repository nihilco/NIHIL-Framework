<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Vote;

class VotePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function update(User $user, Vote $vote)
    {
        return $vote->user_id === $user->id;
    }

    public function delete(User $user, Vote $vote)
    {
        return $vote->user_id === $user->id;
    }
}