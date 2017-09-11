<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasTypes;

class Issue extends Model
{
    use SoftDeletes, HasTypes;

    protected $dates = ['deleted_at'];

    protected $table = 'issues';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    public function resolution()
    {
        return $this->belongsTo(Resolution::class);
    }

    public function assignee()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return '/issues/' . $this->id;
    }
}
