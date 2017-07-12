<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'ratings';

    protected $fillable = ['user_id', 'resource_id', 'resource_type'];

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
        return '/ratings/' . $this->id;
    }
}
