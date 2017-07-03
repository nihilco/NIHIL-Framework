<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Password extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'passwords';

    protected $fillable = ['user_id', 'password', 'retired_at'];
}
