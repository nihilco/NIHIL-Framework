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
        return static::where('email', $email)->first();
    }

    public static function byStripeId($sid)
    {
        return static::where('stripe_id', $sid)->first();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

}
