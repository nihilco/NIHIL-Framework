<?php

namespace App\Traits;

use App\Models\Reply;

trait VoiceReply
{
    public static function bootVoiceReply()
    {

    }

    public function replies()
    {
        return $this->morphMany(Reply::class, 'resource');
    }

    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }
}