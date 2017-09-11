<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'links';

    protected $fillable = ['creator_id', 'label', 'destination', 'uses', 'expires_at'];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return '/links/' . $this->id;
    }
}
