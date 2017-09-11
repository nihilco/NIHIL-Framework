<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'payments';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'creator_id',
        'account_id',
        'customer_id',
        'invoice_id',
        'type_id',
        'stripe_id',
        'reference_number',
        'amount',
        'comments'
    ];

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

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function path()
    {
        return url('/payments/' . $this->id);
    }

    public static function byStripeId($sid)
    {
        return static::where('charge_id', $sid)->first();
    }

    public static function totalOverPeriod($period = 'day')
    {
        if($period == 'day') {
            $payments = static::where('created_at', '>=', \Carbon\Carbon::parse('today')->format('Y-m-d H:i:s'))->get();
        }

        $total = 0;
        $count = 0;
        
        foreach($payments as $payment) {
            $total += $payment->amount;
            $count ++;
        }

        return ['total' => round($total/100), 'count' => $count];
    }
    
    public static function importStripePayments()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $charges = \Stripe\Charge::all();
        
        foreach($charges->data as $charge)
        {
            // if not stripe customer, create one
            if($charge->customer == null) {
                
                $cs = \Stripe\Customer::all();
                $customer = null;
                
                $i = 0;
                foreach($cs->data as $c) {
                    if($c->email == $charge->receipt_email) {
                        $customer = $c;
                        break;
                    }

                }
                
                if($customer == null) {
                    $customer = \Stripe\Customer::create([
                        'email' => $charge->receipt_email,
                        'description' => 'Customer for ' . $charge->receipt_email . '.',
                    ]);
                }
                
            }else{
                
                $customer = \Stripe\Customer::retrieve($charge->customer);
                
            }
            
            //if not user, creat one
            if(!$user = User::byStripeId($customer->id)) {

                User::insert([
                    'stripe_id' => $customer->id,
                    'email' => $customer->email,
                    'created_at' => \Carbon\Carbon::createFromTimestamp($customer->created)->format('Y-m-d H:i:s'),
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                ]);

                $user = User::byEmail($customer->email);
                
            }
            
            if(!$payment = Payment::byStripeId($charge->id))
            {
                $payment = Payment::insert([
                    'invoice_id' => 1,
                    'user_id' => $user->id,
                    'charge_id' => $charge->id,
                    'amount' => $charge->amount,
                    'comments' => $charge->metadata['comments'],
                    'created_at' => \Carbon\Carbon::createFromTimestamp($charge->created)->format('Y-m-d H:i:s'),
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
        }
    }

    public function getFormattedAmount()
    {
        return $this->formatCurrency($this->amount);
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
