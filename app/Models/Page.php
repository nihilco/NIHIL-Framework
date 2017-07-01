<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'core_pages';
    
    protected $fillable = ['user_id', 'title', 'keywords', 'description', 'content', 'posted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
