<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Jobs\SendInvoicePaid;
use App\Mail\InvoicePaid;

class Invoice extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at', 'sent_at', 'due_at', 'viewed_at', 'updated_at'];

    protected $table = 'invoices';
    
    protected $fillable = ['creator_id', 'account_id', 'customer_id', 'type_id', 'status_id', 'billing_address_id', 'shipping_address_id', 'slug', 'subtotal', 'tax_rate', 'tax', 'shipping_total', 'total'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function billingAddress()
    {
        return $this->belongsTo(Address::class, 'billing_address_id');
    }
        
    public function shippingAddress()
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function path()
    {
        return url('/invoices/' . $this->slug);
    }

    public function getFormattedSubtotal()
    {
        return $this->formatCurrency($this->subtotal);
    }

    public function getFormattedTaxRate()
    {
        return $this->formatPercent($this->tax_rate);
    }

    public function getFormattedTax()
    {
        return $this->formatCurrency($this->tax);
    }

    public function getFormattedShippingTotal()
    {
        return $this->formatCurrency($this->shipping_total);
    }

    public function getFormattedTotal()
    {
        return $this->formatCurrency($this->total);
    }

    protected function formatCurrency($int)
    {
        if($int < 0) {
            return '-$' . number_format(($int/-100), 2);
        }else{
            return '$' . number_format(($int/100), 2);
        }
    }

    protected function formatPercent($float)
    {
        return $this->tax_rate . '%';
    }

    public function addItem($cid, $name, $description, $qty, $price)
    {
        return $this->items()->create([
            'creator_id' => $cid,
            'name' => $name,
            'description' => $description,
            'quantity' => $qty,
            'unit_price' => $price,
            'subtotal' => $qty * $price,
        ]);
    }

    public function makePayment($data)
    {
        if(!$user = User::where('email', $data['email'])->first()) {
            $user = User::create([
                'email' => $data['email'],
            ]);
        }

        $customer = $user->customers()->where('account_id', 1)->first();

        $stripeCustomer = \Stripe::retrieveCustomer($customer->stripe_id);

        $stripeToken = \Stripe::retrieveToken($data['token']);

        if($source = $customer->sources()->where(['fingerprint' => $stripeToken->card->fingerprint])->first()) {

            if(!\Hash::check($stripeToken->card->fingerprint . $stripeToken->card_exp_month . $stripeToken->card->exp_year, $source->hash)) {

                // update card
                
            }

        }else {

            // create card
            $stripeSource = $stripeCustomer->sources->create(['source' => $data['token']]);
            
            $source = Source::create([
                'creator_id' => $user->id,
                'account_id' => 1,
                'customer_id' => $customer->id,
                'type_id' => 11,
                'stripe_id' => $stripeSource->id,
                'hash' => Source::createCardhash($stripeToken->card),
                'fingerprint' => $stripeSource->fingerprint,
                'nickname' => $stripeSource->brand . ' ' . $stripeSource->last4,
                'reference_number' => $stripeSource->last4,
                'default' => true,
                'active' => true,
            ]);
                
        }
        
        $stripeData = [
            'source' => $source->stripe_id,
            'currency' => 'usd',
            'amount' => $this->total,
            'description' => 'Payment for invoice #' . $this->id . '.',
            'metadata' => ['application' => 'NIHIL-Framework'],
            'customer' => $customer->stripe_id,
        ];

        if($data['comments']) {
            $stripeData['metadata']['comments'] = $data['comments'];
        }
        
        $stripeCharge = \Stripe::createCharge($stripeData);

        $payment = Payment::create([
            'creator_id' => $user->id,
            'account_id' => 1,
            'customer_id' => $customer->id,
            'invoice_id' => $this->id,
            'type_id' => 25, 
            'reference_number' => $stripeCharge->id,
            'amount' => $stripeCharge->amount,
            'comments' => $data['comments'],
        ]);

        // Update invoice
        $this->status_id = 10;
        $this->paid_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $this->save();
        
        // Email customer
        //$job = (new SendInvoicePaid($this, $payment))->onQueue('emails');
        //dispatch($job);
        $message = (new InvoicePaid($this, $payment))
            ->onQueue('emails');
        
        \Mail::to($user->email)
            ->queue($message);
        
        return $payment;
    }

    private function customerSource($stripeCustomer)
    {
        $sources = $stripeCustomer->sources;

        return $sources['data'][count($sources['data'])-1];
    }
}
