<?php

namespace NIHILCo\Forums\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use NIHILCo\Forums\Models\CanVote;
use App\Traits\LogActivity;

class Reply extends Model
{
    use SoftDeletes, CanVote, LogActivity;

    protected $dates = ['deleted_at'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forums_replies';

    protected $fillable = ['body', 'user_id'];

    protected $with = ['thread', 'user'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($reply) {
            $reply->votes()->delete();
        });
    }
    
    public function path()
    {
        return $this->thread->path() . '/' . $this->id;
    }
    
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

}
