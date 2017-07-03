<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasTypes;

class Source extends Model
{
    use SoftDeletes, HasTypes;

    protected $dates = ['deleted_at'];

    protected $table = 'sources';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
