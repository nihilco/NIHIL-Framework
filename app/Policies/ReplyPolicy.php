<?php

namespace NIHILCo\Forums\Policies;

use App\User;
use NIHILCo\Forums\Models\Reply;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function update(User $user, Reply $reply)
    {
        return $reply->user_id === $user->id;
    }
}