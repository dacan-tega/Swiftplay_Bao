<?php

namespace Slotgen\SpaceMan;

use Illuminate\Support\ServiceProvider;

class SpaceManServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'slotgen.core.spaceman');
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    { 
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'slotgen-spaceman');
            $this->app['router']->namespace('Slotgen\\SpaceMan\\Http\\Controllers\\Api')
            ->group(function () {
                $this->loadRoutesFrom(__DIR__.'/../routes/api-client.php');
            });
        
    }
}
