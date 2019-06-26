<?php

namespace App\Providers;

use App\Helpers\ResponseHelpers;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Response', function ($app) {
            return new ResponseHelpers();
        });
    }
}
