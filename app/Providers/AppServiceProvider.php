<?php

namespace App\Providers;

use App\Routing\customResourceRegistrar;
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
        $this->app->bind(
            'Illuminate\Routing\ResourceRegistrar', // original class to NOT use
            'App\Routing\customResourceRegistrar' // Your class to use INSTEAD
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
