<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $table = 'core_activities';

    protected $fillable = ['user_id', 'action', 'subject_id', 'subject_type'];

    public function subject()
    {
        return $this->morphTo();
    }
}
