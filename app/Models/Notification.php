<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $dates = [];
    
    protected $table = 'notifications';

    protected $fillable = [];    

    public function path()
    {
        return '/notifications/' . $this->id;
    }

    public function markAsRead()
    {
        $this->read_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $this->save();
    }
}
