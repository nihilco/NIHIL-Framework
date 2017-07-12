<?php

namespace App\Traits;

use Illuminate\Database\Query\Expression;
use App\Models\Reply;

trait VoiceReply
{
    public static function bootVoiceReply()
    {
        static::addGlobalScope('replyCount', function ($builder) {
            //$builder->withCount('replies');
            //$expression = new Expression('(select count(*) from `replies` where `replies`.`resource_id` = `threads`.`id` and `replies`.`resource_type` = \'' . get_class($builder->getModel()) . '\' and `replies`.`deleted_at` is null) as `replies_count`');
            //$builder->addSelect($expression);
            //dd($builder);
        });

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
        $this->replies()->create($reply);
    }
}