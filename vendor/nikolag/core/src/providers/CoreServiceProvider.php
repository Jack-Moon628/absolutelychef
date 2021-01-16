<?php

namespace Nikolag\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Nikolag\Core\CoreConfig;
use Nikolag\Core\CoreService;

class CoreServiceProvider extends ServiceProvider
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
        //Config
        $this->app->singleton(CoreConfig::class, function ($app) {
            return new CoreConfig();
        });

        //Facade
        $this->app->alias(CoreService::class, 'core-service');
    }
}
