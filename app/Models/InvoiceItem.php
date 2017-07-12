<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceItem extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'invoice_items';
    
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


    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function path()
    {
        return '/invoice-items/' . $this->id;
    }
}
