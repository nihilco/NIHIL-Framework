<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    protected $table = 'posts';
    
    protected $fillable = ['creator_id', 'title', 'slug', 'description', 'content'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
        
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return '/posts/' . $this->slug;
    }
}
