<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Favorite;

class FavoritePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function update(User $user, Favorite $favorite)
    {
        return $favorite->user_id === $user->id;
    }

    public function delete(User $user, Favorite $favorite)
    {
        return $favorite->user_id === $user->id;
    }
}