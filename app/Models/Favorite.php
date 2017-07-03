<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'favorites';

    protected $fillable = ['user_id', 'resource_id', 'resource_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
