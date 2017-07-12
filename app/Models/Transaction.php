<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasTypes;

class Transaction extends Model
{
    use SoftDeletes, HasTypes;

    protected $dates = ['deleted_at'];

    protected $table = 'transactions';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function fromSource()
    {
        return $this->belongsTo(Source::class);
    }

    public function toSource()
    {
        return $this->belongsTo(Source::class);
    }

    public function path()
    {
        return '/transactions/' . $this->id;
    }
}
