<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class AppHelperServiceProvider extends ServiceProvider
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
        App::bind('apphelper',function(){
           return new \App\Classes\AppHelper;
        });
    }
}
