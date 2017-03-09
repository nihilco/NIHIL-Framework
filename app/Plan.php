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
    protected $fillable = ['name', 'amount', 'currency_id', 'interval', 'interval_count'];

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
