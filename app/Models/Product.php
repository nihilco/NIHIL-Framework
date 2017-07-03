<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'products';

    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
