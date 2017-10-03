<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'customers';

    protected $fillable = [
        'user_id',
        'creator_id',
        'stripe_id',
        'account_id',
        'description',
    ];

    //
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    //
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'resource');
    }

    public function path()
    {
        return '/customers/' . $this->id;
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class)->latest();
    }

    public function orders()
    {
        return $this->hasMany(Order::class)->latest();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class)->latest();
    }

    public function sources()
    {
        return $this->hasMany(Source::class)->latest();
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class)->latest();
    }

    public static function createStripeCustomer($user)
    {
        $description = 'Customer profile for ' . $user->name . ' [' . $user->email . '].';

        if(!$stripeCustomer = static::getStripeCustomerByEmail($user->email)) {
            $stripeCustomer = \Stripe::createCustomer([
                'email' => $user->email,
                'description' => $description,
            ]);
        }

        return Customer::create([
            'creator_id' => $user->id,
            'user_id' => $user->id,
            'account_id' => 5,
            'stripe_id' => $stripeCustomer->id,
            'description' => $description,
        ]);
    }

    public static function getStripeCustomerByEmail($email)
    {
        $stripeCustomers = \Stripe::getAllCustomers();

        foreach($stripeCustomers->data as $stripeCustomer) {
            if($stripeCustomer->email == $email) {
                return $stripeCustomer;
            }
        }

        return false;
    }    
}
