<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'stripe_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];

    public static function byEmail($email)
    {
        return static::where('email', $email)->firstOrFail();
    }

    public static function byStripeId($sid)
    {
        return static::where('stripe_id', $sid)->firstOrFail();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function createStripeCustomerId()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $customers = \Stripe\Customer::all();
        $customer = null;
        
        foreach($customers['data'] as $c) {
            if($c->email == $this->email) {
                $customer = $c;
                break;
            }
        }
        
        if(!$customer) {
            $customer = \Stripe\Customer::create(array(
                "description" => "Customer for " . $this->email . ".",
                "email" => $this->email,
            ));
        }

        $this->stripe_id = $customer->id;
        return $this->save();
    }
}
