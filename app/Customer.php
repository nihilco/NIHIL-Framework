<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    public function cards()
    {
        return $this->hasMany(CreditCard::class);
    }
    
    //
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    //
    public static function byAccountAndUserIds($aid, $uid)
    {
        return static::where('account_id', $aid)
            ->where('user_id', $uid)
            ->first();
    }

    //
    public static function createStripeCustomerId(User $user)
    {
        if($account = Account::find(constant('NF_ACCOUNT_ID'))) {
            \Stripe\Stripe::setApiKey(\Crypt::decrypt($account->secret_key));
        }else{
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        }

        $customers = \Stripe\Customer::all();
        $customer = null;
        
        foreach($customers['data'] as $c) {
            if($c->email == $user->email) {
                $customer = $c;
                break;
            }
        }
        
        if(!$customer) {
            $customer = \Stripe\Customer::create(array(
                "description" => "Customer for " . $user->email . ".",
                "email" => $user->email,
            ));
        }

        Customer::insert([
            'user_id' => $user->id,
            'account_id' => constant('NF_ACCOUNT_ID'),
            'stripe_id' => $customer->id,
            'created_at' => \Carbon\Carbon::createFromTimestamp($customer->created)->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        return Customer::byAccountAndUserIds(constant('NF_ACCOUNT_ID'), $user->id);
    }
        
    //
    public static function importStripeCustomers()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $customers = \Stripe\Customer::all();

        foreach($customers->data as $customer) {
            if(!$user = User::byStripeId($customer->id)) {
                User::create([
                    'email' => $customer->email,
                    'stripe_id' => $customer->id,
                    'created_at' => \Carbon\Carbon::createFromTimestamp($customer->created)->format('Y-m-d H:i:s'),
                ]);
            }
        }
    }

}
