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
    
}
