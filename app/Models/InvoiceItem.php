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
    protected $fillable = ['creator_id', 'invoice_id', 'name', 'description', 'quantity', 'unit_price'];

    public function creator()
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

    public function getFormattedSubtotal()
    {
        return $this->formatCurrency($this->subtotal);
    }

    public function getFormattedPrice()
    {
        return $this->formatCurrency($this->unit_price);
    }

    protected function formatCurrency($int)
    {
        if($int < 0) {
            return '-$' . number_format(($int/-100), 2);
        }else{
            return '$' . number_format(($int/100), 2);
        }
    }
}
