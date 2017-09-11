<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follow extends Model
{
    use SoftDeletes;

    //
    protected $dates = ['deleted_at'];

    protected $table = 'follows';

    protected $fillable = ['creator_id', 'user_id', 'resource_id', 'resource_type'];

    public static function boot()
    {
        parent::boot();
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

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
        return '/follows/' . $this->id;
    }
}
