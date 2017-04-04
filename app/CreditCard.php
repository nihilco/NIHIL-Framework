<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['account_id', 'customer_id', 'stripe_id', 'brand', 'last_4', 'fingerprint', 'default', 'added_at'];

    //
    public function user()
    {
        return $this->hasOne(CreditCard::class);
    }
}
