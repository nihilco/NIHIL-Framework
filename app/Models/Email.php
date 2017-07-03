<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $table = 'emails';
    
    protected $fillable = ['user_id', 'to', 'from', 'subject', 'text', 'html', 'send_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
