<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $table = 'publishers';

    protected $fillable = ['creator_id', 'address_id', 'name', 'description'];
    
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function parent()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function path()
    {
        return '/publishers/' . $this->id;
    }

}
