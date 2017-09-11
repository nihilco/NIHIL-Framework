<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $table = 'authors';

    protected $fillable = [
        'user_id',
        'prefix',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'website'
    ];
    
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class)->withTimestamps();
    }
    
    public function path()
    {
        return '/authors/' . $this->id;
    }
}
