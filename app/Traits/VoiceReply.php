<?php

namespace App\Traits;

use Illuminate\Database\Query\Expression;
use App\Notifications\ReplyWasMade;
use App\Models\Reply;

trait VoiceReply
{
    public static function bootVoiceReply()
    {
        static::deleting(function ($resource) {
            $resource->replies->each->delete();
        });
    }

    public function replies()
    {
        return $this->morphMany(Reply::class, 'resource');
    }

    public function addReply($reply)
    {
        $reply = $this->replies()->create($reply);

        if($this->canFollow) {
            foreach($this->follows as $follow) {
                if($follow->user_id != $reply->user_id) {
                    $follow->user->notify(new ReplyWasMade($reply));
                }
            }
        }

        return $reply;
    }
}