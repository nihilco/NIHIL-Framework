<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //
    public static function allAsSlugIndexedArray()
    {
        $currencies = static::all();

        $ret = array();
        
        foreach($currencies as $currency) {
            $ret[$currency->slug] = $currency;
        }
        
        return $ret;
    }
}
