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

    //public function posts()
    //{
    //    return $this->hasMany(Post::class);
    //}

    //public function customers()
    //{
    //    return $this->hasMany(Customer::class);
    //}

    //public function threads()
    //{
    //    return $this->hasMany(\NIHILCo\Forums\Models\Thread::class)->latest();
    //}

    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }

}
