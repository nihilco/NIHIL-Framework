<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $table = 'themes';
    
    protected $fillable = ['creator_id', 'name', 'slug', 'description'];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return '/themes/' . $this->id;
    }
}
