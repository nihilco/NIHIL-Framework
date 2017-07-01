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
            'mode' => 'live',
            'stripe_id' => $account->id,
            'publishable_key' => $account->keys->publishable,
            'secret_key' => \Crypt::encrypt($account->keys->secret),
            'description' => 'Live managed account for the Blue Springs Historical Association.',
            'country_id' => 1,
            'managed' => true,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }

    public static function editStripeAccount($sid)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $account = \Stripe\Account::retrieve($sid);

        //$account->business_name = 'Blue Springs Historical Association Inc.';
        //$account->business_url = 'https://bluespringshistoricalassociation.org';
        //$account->email = 'contact@bluespringshistoricalassociation.org';
        //$account->legal_entity->type = 'company';
        //$account->legal_entity->business_name = 'Blue Springs Historical Association Inc.';
        //$account->legal_entity->address->line1 = '330 Elmwood Road';
        //$account->legal_entity->address->city = 'Midway';
        //$account->legal_entity->address->state = 'TN';
        //$account->legal_entity->address->postal_code = '37809';
        //$account->legal_entity->first_name = 'Wilhelmina';
        //$account->legal_entity->last_name = 'Williams';
        //$account->legal_entity->business_tax_id = '81-0771211';
        //$account->legal_entity->dob->day = '8';
        //$account->legal_entity->dob->month = '6';
        //$account->legal_entity->dob->year = '1944';
        //$account->legal_entity->personal_id_number = '412-72-7535';

        //$account->external_accounts->create(array("external_account" => array(
        //    'object' => 'bank_account',
        //    'account_number' => '047000294',
        //    'country' => 'US',
        //    'currency' => 'usd',
        //    'account_holder_name' => 'Blue Springs Historical Association Inc.',
        //    'account_holder_type' => 'company',
        //    'routing_number' => '064204347',
        //)));

        //$account->tos_acceptance->date = \Carbon\Carbon::now()->timestamp;;
        //$account->tos_acceptance->ip = \Request::ip();
        //$account->tos_acceptance->user_agent = \Request::header('User-Agent');
        
        $account->save();

        die(print_r($account));
    }
}
