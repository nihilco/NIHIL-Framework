<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $table = 'regions';
    
    protected $fillable = ['parent_id', 'creator_id', 'country_id', 'name', 'abbr', 'description'];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function parent()
    {
        return $this->belongsTo(Region::class, 'parent_id');
    }

    public function path()
    {
        return '/regions/' . $this->id;
    }
}
