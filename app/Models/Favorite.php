<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'core_favorites';

    protected $fillable = ['user_id', 'resource_id', 'resource_type'];
}
