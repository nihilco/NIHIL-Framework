<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'pages';
    
    protected $fillable = ['creator_id', 'title', 'slug', 'description', 'content', 'posted_at'];

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
        return '/pages/' . $this->slug;
    }
}
