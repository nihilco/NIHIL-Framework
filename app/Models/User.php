<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable;

    protected $dates = ['deleted_at'];

    protected $table = 'users';
    
    protected $fillable = [
        'name', 'username', 'email', 'password', 'tos_acceptance_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];

    public static function boot()
    {
        parent::boot();

        //static::created(function ($user) {
        //    Customer::createStripeCustomer($user);
        //});
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public static function byUsername($username)
    {
        return static::where('username', $username)->first();
    }

    public static function byEmail($email)
    {
        return static::where('email', $email)->first();
    }

    public function accounts()
    {
        return $this->hasMany(Account::class)->latest();
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class)->latest();
    }

    public function emails()
    {
        return $this->hasMany(Email::class)->latest();
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class)->latest();
    }

    public function forums()
    {
        return $this->hasMany(Forum::class)->latest();
    }

    public function issues()
    {
        return $this->hasMany(Issue::class)->latest();
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class)->latest();
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)->latest();
    }

    public function threads()
    {
        return $this->hasMany(Thread::class)->latest();
    }

    public function votes()
    {
        return $this->hasMany(Vote::class)->latest();
    }

    public function hasVoteForResource($resource)
    {
        return Vote::where([
            'user_id' => $this->id,
            'resource_id' => $resource->id,
            'resource_type' => get_class($resource),
        ])->first();
    }

    public function path()
    {
        return url('/users/' . $this->id);
    }
}
