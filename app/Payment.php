<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['invoice_id', 'customer_id', 'stripe_id', 'amount', 'comments'];

    public static function byStripeId($sid)
    {
        return static::where('charge_id', $sid)->first();
    }
    
    public static function importStripePayments()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $charges = \Stripe\Charge::all();
        
        foreach($charges->data as $charge)
        {
            // if not stripe customer, create one
            if($charge->customer == null) {
                
                $cs = \Stripe\Customer::all();
                $customer = null;
                
                $i = 0;
                foreach($cs->data as $c) {
                    if($c->email == $charge->receipt_email) {
                        $customer = $c;
                        break;
                    }

                }
                
                if($customer == null) {
                    $customer = \Stripe\Customer::create([
                        'email' => $charge->receipt_email,
                        'description' => 'Customer for ' . $charge->receipt_email . '.',
                    ]);
                }
                
            }else{
                
                $customer = \Stripe\Customer::retrieve($charge->customer);
                
            }
            
            //if not user, creat one
            if(!$user = User::byStripeId($customer->id)) {

                User::insert([
                    'stripe_id' => $customer->id,
                    'email' => $customer->email,
                    'created_at' => \Carbon\Carbon::createFromTimestamp($customer->created)->format('Y-m-d H:i:s'),
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                ]);

                $user = User::byEmail($customer->email);
                
            }
            
            if(!$payment = Payment::byStripeId($charge->id))
            {
                $payment = Payment::insert([
                    'invoice_id' => 1,
                    'user_id' => $user->id,
                    'charge_id' => $charge->id,
                    'amount' => $charge->amount,
                    'comments' => $charge->metadata['comments'],
                    'created_at' => \Carbon\Carbon::createFromTimestamp($charge->created)->format('Y-m-d H:i:s'),
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
