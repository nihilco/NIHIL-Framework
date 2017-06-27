<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tripper extends Model
{
    //
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    //
    public function group()
    {
        return $this->belongsTo(TripGroup::class);
    }
}
