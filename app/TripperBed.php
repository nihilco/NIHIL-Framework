<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripperBed extends Model
{
    //
    public function tripper()
    {
        return $this->belongsTo(Tripper::class);
    }
}
