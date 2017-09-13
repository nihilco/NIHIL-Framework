<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Request;

class ConfigServiceProvider extends ServiceProvider
{
    public function register()
    {
        $template = 'default';
        
        if(array_key_exists('SERVER_NAME', $_SERVER)) {
            $template = $_SERVER['SERVER_NAME'];
        }

        $config = app('config');
        $config->set('template', $template);
    }
}