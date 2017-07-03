<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\CastVote;
use App\Traits\LogActivity;

class Reply extends Model
{
    use SoftDeletes, CastVote, LogActivity;

    protected $dates = ['deleted_at'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'replies';

    protected $fillable = ['body', 'user_id'];

    protected $with = ['user'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($reply) {
            $reply->votes()->delete();
        });
    }
    
    public function path()
    {
        return $this->resource->path() . '/' . $this->id;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resource()
    {
        return $this->morphTo();
    }
}
