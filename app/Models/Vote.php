<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\LogActivity;

class Vote extends Model
{
    use SoftDeletes, LogActivity;
        
    const VOTE_UP = 'up';
    const VOTE_DOWN = 'down';

    protected $dates = ['deleted_at'];
        
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'votes';

    protected $fillable = ['user_id', 'resource_id', 'resource_type', 'vote'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resource()
    {
        return $this->morphTo();
    }

    public function scopeReplies($query)
    {
        return $query->where('resource_type', get_class(new Reply()));
    }

    public function scopeThreads($query)
    {
        return $query->where('resource_type', get_class(new Thread()));
    }

    public function scopeUp($query)
    {
        return $query->where('vote', Vote::VOTE_UP);
    }

    public function scopeDown($query)
    {
        return $query->where('vote', Vote::VOTE_DOWN);
    }

    public function path()
    {
        return '/votes/' . $this->id;
    }
}
