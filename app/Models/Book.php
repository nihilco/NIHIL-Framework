<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $table = 'books';

    protected $fillable = [
        'user_id',
        'series_id',
        'series_order',
        'title',
        'subtitle',
        'first_published_at',
    ];
    
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class)->withTimestamps();
    }

    public function addAuthor($aid)
    {
        return $this->authors()->attach($aid);
    }
    
    public function path()
    {
        return '/books/' . $this->id;
    }
}
