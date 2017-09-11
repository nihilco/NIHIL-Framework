<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Currency;

class Plan extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'plans';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id',
        'creator_id',
        'name',
        'slug',
        'description',
        'amount',
        'currency_id',
        'interval',
        'interval_count'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function path()
    {
        return '/plans/' . $this->id;
    }   
}
