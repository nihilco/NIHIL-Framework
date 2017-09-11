<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Notification;

class NotificationPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function update(User $user, Notification $notifaction)
    {
        if((int)$notification->notifiable_id == $user->id && $notification->notifiable_type == get_class($user)) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Notification $notification)
    {
        if((int)$notification->notifiable_id == $user->id && $notification->notifiable_type == get_class($user)) {
            return true;
        }

        return false;
    }
}