<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\LogActivity;
use App\Traits\CastVote;
use App\Traits\VoiceReply;

class Thread extends Model
{
    use SoftDeletes, CastVote, LogActivity, VoiceReply;

    protected $dates = ['deleted_at'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'threads';

    protected $fillable = ['title', 'slug', 'body', 'user_id'];
    
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('replyCount', function ($builder) {
            $builder->withCount('replies');
        });

        static::deleting(function ($thread) {
            foreach($thread->replies as $reply) {
                foreach($reply->votes as $vote) {
                    $vote->delete();
                }
                $reply->delete();
            }
            $thread->votes()->delete();
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function path()
    {
        //return $this->forum->path() . '/' . $this->slug;
        return '/threads/' . $this->slug;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }    

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}
