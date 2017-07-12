<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $table = 'activities';
    
    protected $fillable = ['user_id', 'action', 'resource_id', 'resource_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function resource()
    {
        return $this->morphTo();
    }

    public function path()
    {
        return '/activities/' . $this->id;
    }

    public static function feed(User $user, $take = 25)
    {
        return static::where('user_id', $user->id)
                    ->latest()
                    ->with('resource')
                    ->take($take)
                    ->get()
                    ->groupBy(function ($activity) {
                        return $activity->created_at->format('Y-m-d');
                    });
    }
}
