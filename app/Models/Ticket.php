<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $table = 'tickets';

    protected $fillable = ['creator_id', 'user_id', 'slug', 'price'];
    
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return '/tickets/' . $this->slug;
    }
}
