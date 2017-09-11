<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'tags';

    protected $fillable = ['creator_id', 'name', 'slug', 'description'];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return '/tags/' . $this->id;
    }
}
