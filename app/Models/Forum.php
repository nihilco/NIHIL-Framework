<?php

namespace NIHILCo\Forums\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\LogActivity;

class Forum extends Model
{
    use SoftDeletes, LogActivity;

    protected $dates = ['deleted_at'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forums_forums';

    protected $fillable = ['title', 'slug', 'description', 'user_id'];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('threadCount', function ($builder) {
            $builder->withCount('threads');
        });

        static::deleting(function ($forum) {
            foreach($forum->threads as $thread) {
                foreach($thread->replies as $reply) {
                    foreach($reply->votes as $vote) {
                        $vote->delete();
                    }
                    $reply->delete();
                }
                $thread->votes()->delete();
                $thread->delete();
            }
        });

    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function path()
    {
        return '/forums/' . $this->slug;
    }

    public function threads()
    {
        return $this->hasMany(Thread::class)->orderBy('created_at', 'asc')
                    ->with(['user', 'forum']);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function addThread($thread)
    {
        $this->threads()->create($thread);
    }

    public function replyCount()
    {
        $ret = 0;
        foreach($this->threads as $thread) {
            $ret += $thread->replies_count;
        }
        return $ret;
    }

    public function lastUpdate()
    {
        $threads = $this->threads;
        if($threads->count() > 0) {
            return $threads->first()->updated_at->diffForHumans();
        }else{
            return '';
        }
    }

}
