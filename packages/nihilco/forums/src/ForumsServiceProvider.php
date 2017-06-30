<?php

namespace NIHILCo\Forums;

use Illuminate\Support\ServiceProvider;

class ForumsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadViewsFrom(__DIR__.'/Views', 'forums');

        //
        $this->publishes([
            __DIR__.'/Config/package.php' => config_path('forums.php')
        ], 'config');
        
        $this->publishes([
            __DIR__.'/Views' => base_path('resources/views/nihilco/forums'),
        ]);

        $this->publishes([
            __DIR__.'/Migrations' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__.'/Seeds' => database_path('seeds')
        ], 'seeds');

        $this->publishes([
            __DIR__.'/Factories' => database_path('factories')
        ], 'factories');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        include __DIR__.'/Routes/web.php';
        $this->app->make('NIHILCo\Forums\Controllers\ThreadsController');
    }
}
