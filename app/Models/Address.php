<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $table = 'addresses';

    protected $fillable = [];
    
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function resource()
    {
        return $this->morphTo();
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function path()
    {
        return '/addresses/' . $this->id;
    }

    public function getFormattedRegionLine()
    {
        return $this->city . ', ' . $this->region->abbr . ' ' . $this->zipcode . ', ' . $this->country->abbr;
    }
}
