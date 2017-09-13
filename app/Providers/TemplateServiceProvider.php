<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\FileViewFinder;
use Illuminate\View\ViewServiceProvider;

class TemplateServiceProvider extends ViewServiceProvider
{
    public function registerViewFinder()
    {
        $this->app->bind('view.finder', function ($app) {
            $template = $app['config']['template'];

            $paths = $app['config']['view.paths'];
            
            if(file_exists(realpath(base_path('themes/' . $template . '/resources/views')))) {
                array_unshift($paths, realpath(base_path('themes/' . $template . '/resources/views')));
            }



            return new FileViewFinder($app['files'], $paths);
        });
    }
}