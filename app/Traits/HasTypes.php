<?php

namespace App\Traits;

use App\Models\Type;

trait HasTypes
{
    public static function bootHasTypes()
    {

    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}