<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Billing\Stripe;

class StripeServiceProvider extends ServiceProvider
{
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
        //
        $this->app->singleton(Stripe::class, function () {
            return new Stripe(
                config('services.stripe.mode'),
                config('services.stripe.publishableKey'),
                config('services.stripe.secretKey')
            );
        });
    }
}
