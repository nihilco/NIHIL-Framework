<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'core_links';

    protected $fillable = ['user_id', 'label', 'destination', 'uses', 'expires_at'];
}
