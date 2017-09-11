<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\LogActivity;
use App\Traits\MarkFavorite;
use App\Traits\FollowResource;

class Forum extends Model
{
    use SoftDeletes, LogActivity, MarkFavorite, FollowResource;

    protected $dates = ['deleted_at'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forums';

    protected $fillable = ['creator_id', 'user_id', 'title', 'slug', 'description'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function($forum) {
            $forum->threads->each->delete();
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
        return $this->hasMany(Thread::class)->latest()
            ->with(['user', 'forum']);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Forum::class, 'parent_id');
    }

    public function forums()
    {
        return $this->hasMany(Forum::class, 'id', 'parent_id')->latest();
    }

    public function addThread($thread)
    {
        $this->threads()->create($thread);
    }

    public function getReplyCount()
    {
        $count = 0;
        foreach($this->threads() as $thread) {
            $count += $thread->replies()->count();
        }
        return $count;
    }
}
