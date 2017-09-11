<?php

namespace App\Traits;

use Illuminate\Database\Query\Expression;
use App\Models\Favorite;

trait MarkFavorite
{
    public static function bootMarkFavorite()
    {

    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'resource');
    }

    public function favorite($uid = null)
    {
        $this->favorites()->create([
            'user_id' => $uid ?: auth()->id(),
        ]);
    }

    public function unfavorite($uid = null)
    {
        $this->favorites()->where('user_id', $uid ?: auth()->id())->delete();
    }

    public function favorited($uid = null)
    {
        if($favorite = $this->favorites()->where('user_id', $uid?: auth()->id())->first()) {
            return $favorite;
        }
            
        return false;
    }
}