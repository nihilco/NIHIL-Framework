<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Edition extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $table = 'editions';

    protected $fillable = ['name', 'description'];
    
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return '/editions/' . $this->id;
    }

}
