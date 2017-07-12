<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'subscriptions';
    
    protected $fillable = [
        'account_id',
        'customer_id',
        'plan_id',
        'stripe_id',
        'number_of_terms',
        'end_after_terms',
        'end_at',
        'renewed_at',
        'expires_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function path()
    {
        return '/subscriptions/' . $this->id;
    }
}
