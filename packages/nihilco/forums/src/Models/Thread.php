<?php

namespace NIHILCo\Forums\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\LogActivity;

class Thread extends Model
{
    use SoftDeletes, CanVote, LogActivity;

    protected $dates = ['deleted_at'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forums_threads';

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
        return $this->forum->path() . '/' . $this->slug;
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)->orderBy('created_at', 'asc');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }    
    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}
