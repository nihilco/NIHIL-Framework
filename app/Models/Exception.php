<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exception extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'exceptions';

    protected $fillable = ['user_id', 'message', 'stacktrace'];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Exception::class);
    }

    public function path()
    {
        return '/exceptions/' . $this->id;
    }
}
