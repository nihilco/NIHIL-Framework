<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $table = 'sessions';
    
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function path()
    {
        return '/sessions/' . $this->id;
    }
}
