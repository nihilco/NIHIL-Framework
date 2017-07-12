<?php

namespace App\Traits;

trait MarkFavorite
{
    public static function bootMarkFavorite()
    {

    }

    public function favorites()
    {
        return $this->morphMany('App\Models\Favorite', 'resource');
    }
}