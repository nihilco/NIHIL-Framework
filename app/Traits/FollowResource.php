<?php

namespace App\Traits;

use Illuminate\Database\Query\Expression;
use App\Models\Follow;
use App\Notifications\ReplyWasMade;

trait FollowResource
{
    public static function bootFollowResource()
    {

    }

    public function follows()
    {
        return $this->morphMany(Follow::class, 'resource');
    }

    public function follow($uid = null)
    {
        $this->follows()->create([
            'creator_id' => $uid ?: auth()->id(),
            'user_id' => $uid ?: auth()->id(),
        ]);

        return $this;
    }

    public function unfollow($uid = null)
    {
        $this->follows()->where('user_id', $uid ?: auth()->id())->delete();
    }

    public function followed($uid = null)
    {
        if($follow = $this->follows()->where('user_id', $uid?: auth()->id())->first()) {
            return $follow;
        }
            
        return false;
    }

    public function getCanFollowAttribute()
    {
        return true;
    }
}