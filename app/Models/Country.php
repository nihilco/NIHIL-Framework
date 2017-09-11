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
    
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    public function path()
    {
        return '/countries/' . $this->id;
    }

}
