<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $table = 'groups';
    
    protected $fillable = ['creator_id', 'name', 'color', 'description'];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Group::class);
    }

    public function path()
    {
        return '/groups/' . $this->id;
    }
}
