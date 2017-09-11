<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $dates =['deleted_at'];
    
    protected $table = 'accounts';

    //
    protected $fillable = [
        'mode',
        'status',
        'name',
        'stripe_id',
        'publishable_key',
        'secret_key',
        'description',
        'country_id',
        'managed',
        'user_id'
    ];

    public function path()
    {
        return '/accounts/' . $this->id;
    }
    
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function sources()
    {
        return $this->hasMany(Source::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public static function createStripeAccount($data)
    {
        $stripeAccount = \Stripe::createAccount([
            'type' => 'custom',
            'country' => 'US',
            'email' => $data['email'],
            'business_name' => $data['name'],
            'business_url' => $data['url'],
        ]);

        return Account::create([
            'creator_id' => $data['creator_id'],
            'user_id' => $data['user_id'],
            'mode' => $data['mode'],
            'status' => $data['status'],
            'name' => $data['name'],
            'stripe_id' => $stripeAccount->id,
            'publishable_key' => $stripeAccount->keys['publishable'],
            'secret_key' => \Crypt::encrypt($stripeAccount->keys['secret']),
            'api_version' => '2017-06-05',
            'description' => $data['description'],
            'country_id' => $data['country_id'],
            'managed' => $data['managed'],
        ]);
    }

    public static function getStripeAccountByName($name)
    {
        $stripeAccounts = \Stripe::getAllAccounts();

        foreach($stripeAccounts->data as $stripeAccount) {
            if($stripeAccount->business_name == $name) {
                return $stripeAccount;
            }
        }

        return false;
    }
}
