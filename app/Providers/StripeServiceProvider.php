<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class StripeServiceProvider extends ServiceProvider
{
    protected $defer = true;
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\App\Libraries\Stripe::class, function ($app) {

            //if(!$account = \App\Models\Account::find(1)) {
            //    $account = factory('App\Models\Account')->make([
            //        'user_id' => 1,
            //        'mode' => env('STRIPE_MODE'),
            //        'status' => 'active',
            //        'name' => env('STRIPE_ACCOUNT_NAME'),
            //        'stripe_id' => env('STRIPE_ACCOUNT_ID'),
            //        'publishable_key' => env('STRIPE_PUBLISHABLE_KEY'),
            //        'secret_key' => \Crypt::encrypt(env('STRIPE_SECRET_KEY')),
            //        'api_version' => '2017-06-05',
            //        'description' => 'Stand alone account for The NIHIL Corporation.',
            //        'country_id' => 1,
            //        'managed' => false,
            //    ]);
            //}
            
            return new \App\Libraries\Stripe(env('STRIPE_MODE'));
        });
        
        $this->app->alias(\App\Libraries\Stripe::class, 'stripe');
    }

    public function provides()
    {
        return [
            \App\Libraries\Stripe::class,
            'stripe'
        ];
    }
}
