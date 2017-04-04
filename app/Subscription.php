<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //
    protected $fillable = ['account_id', 'customer_id', 'plan_id', 'stripe_id', 'number_of_terms', 'end_after_terms', 'end_at', 'renewed_at', 'expires_at'];
}
