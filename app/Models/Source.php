<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasTypes;

class Source extends Model
{
    use SoftDeletes, HasTypes;

    protected $dates = ['deleted_at'];

    protected $table = 'sources';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['creator_id', 'account_id', 'customer_id', 'type_id', 'stripe_id', 'hash', 'fingerprint', 'nickname', 'reference_number'];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
    
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function path()
    {
        return '/sources/' . $this->id;
    }

    public static function createCardHash($card)
    {
        return \Hash::make($card->fingerprint . $card->exp_month . $card->exp_year);
    }
}
