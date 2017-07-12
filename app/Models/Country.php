<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $table = 'countries';

    protected $fillable = ['name', 'abbr', 'description'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function path()
    {
        return '/countries/' . $this->id;
    }

}
