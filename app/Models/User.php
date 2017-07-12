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

    public function accounts()
    {
        return $this->hasMany(Account::class)->latest();
    }

    public function activities()
    {
        return $this->hasMany(Activity::class)->latest();
    }

    public function categories()
    {
        return $this->hasMany(Category::class)->latest();
    }

    public function countries()
    {
        return $this->hasMany(Country::class)->latest();
    }

    public function currencies()
    {
        return $this->hasMany(Currency::class)->latest();
    }
    
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class)->latest();
    }

    public function exceptions()
    {
        return $this->hasMany(Exception::class)->latest();
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class)->latest();
    }

    public function forums()
    {
        return $this->hasMany(Forum::class)->latest();
    }

    public function groups()
    {
        return $this->hasMany(Group::class)->latest();
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class)->latest();
    }

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class)->latest();
    }

    public function issues()
    {
        return $this->hasMany(Issue::class)->latest();
    }

    public function links()
    {
        return $this->hasMany(Link::class)->latest();
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class)->latest();
    }

    public function pages()
    {
        return $this->hasMany(Page::class)->latest();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class)->latest();
    }

    public function plans()
    {
        return $this->hasMany(Plan::class)->latest();
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function priorities()
    {
        return $this->hasMany(Priority::class)->latest();
    }

    public function products()
    {
        return $this->hasMany(Product::class)->latest();
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class)->latest();
    }

    public function resolutions()
    {
        return $this->hasMany(Resolution::class)->latest();
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)->latest();
    }

    public function sources()
    {
        return $this->hasMany(Source::class)->latest();
    }

    public function states()
    {
        return $this->hasMany(State::class)->latest();
    }

    public function statuses()
    {
        return $this->hasMany(Status::class)->latest();
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class)->latest();
    }

    public function tags()
    {
        return $this->hasMany(Tag::class)->latest();
    }

    public function themes()
    {
        return $this->hasMany(Theme::class)->latest();
    }

    public function threads()
    {
        return $this->hasMany(Thread::class)->latest();
    }

    public function types()
    {
        return $this->hasMany(Type::class)->latest();
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
        return '/users/' . $this->id;
    }
}
