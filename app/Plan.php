<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Currency;

class Plan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['account_id', 'name', 'amount', 'currency_id', 'interval', 'interval_count'];

    public static function findUniquePlan($aid, $a, $cid, $i, $ic)
    {
        return Plan::where('account_id', $aid)
                   ->where('amount', $a)
                   ->where('currency_id', $cid)
                   ->where('interval', $i)
                   ->where('interval_count', $ic)
                   ->first();
    }

    public function checkIfPlanIsUnique()
    {
        if(!$this->account || !$this->amount || !$this->currency_id || !$this->interval || !$this->interval_count) {
            return false;
        }

        if(!$plan = Plan::where('account_id', $this->account_id)
                        ->where('amount', $this->amount)
                        ->where('currency_id', $this->currency_id)
                        ->where('interval', $this->interval)
                        ->where('interval_count', $this->interval_count)
                        ->first()
        ) {
            return true;
        }
        
        return false;
    }
    
    public static function importStripePlans()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $plans = \Stripe\Plan::all();

        $currencies = Currency::allAsSlugIndexedArray();
        
        $insert = array();
        
        foreach($plans->data as $plan)
        {
            if(!$p = Plan::find($plan->id)) {
                $insert[] = [
                    'id' => $plan->id,
                    'name' => $plan->name,
                    'amount' => $plan->amount,
                    'currency_id' => $currencies[$plan->currency]->id,
                    'interval' => $plan->interval,
                    'interval_count' => $plan->interval_count,
                    'created_at' => \Carbon\Carbon::createFromTimestamp($plan->created)->format('Y-m-d H:i:s'),
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                ];
            }
        }

        return Plan::insert($insert);
    }
}
