<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'currencies';

    protected $fillable = ['name', 'symbol', 'abbr', 'description'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return '/currencies/' . $this->id;
    }
}
