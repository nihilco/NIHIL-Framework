<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\LogActivity;
use App\Traits\CastVote;
use App\Traits\VoiceReply;
use App\Traits\MarkFavorite;
use App\Traits\FollowResource;

class Thread extends Model
{
    use SoftDeletes, CastVote, LogActivity, VoiceReply, MarkFavorite, FollowResource;

    protected $dates = ['deleted_at'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'threads';

    protected $fillable = ['creator_id', 'user_id', 'title', 'slug', 'body'];
    
    public static function boot()
    {
        parent::boot();

        static::created(function ($thread) {
            $thread->forum->increment('threads_count');
        });

        static::deleted(function ($thread) {
            $thread->forum->decrement('threads_count');
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function path()
    {
        //dd($this);
        return $this->forum->path() . '/'  . $this->slug;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
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
