<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $fillable = [];

    public static function byStripeAccountId($said)
    {
        return static::where('account_id', $said)->first();
    }
    
    public static function importStripeAccounts()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    }

    public static function createStripeAccount()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $account = \Stripe\Account::create(array(
            "managed" => true,
            "country" => "US",
        ));

        Account::insert([
            'user_id' => 2,
            'mode' => 'test',
            'account_id' => $account->id,
            'publishable_key' => $account->keys->publishable,
            'secret_key' => \Crypt::encrypt($account->keys->secret),
            'description' => 'Test connected account for The Taraloka Foundation.',
            'country_id' => 1,
            'managed' => true,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
