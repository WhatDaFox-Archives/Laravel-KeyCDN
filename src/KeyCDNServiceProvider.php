<?php

namespace KeyCDN;

use Illuminate\Support\ServiceProvider;

/**
 * Class KeyCDNServiceProvider
 * @package KeyCDN
 */
class KeyCDNServiceProvider extends ServiceProvider
{
    /**
     * Register config files
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/keycdn.php' => config_path('keycdn.php'),
        ]);
    }

    /**
     * Register Service
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/keycdn.php', 'keycdn'
        );

        $this->app->bind(KeyCDN::class, function() {
            return KeyCDN::create(config('keycdn.key'));
        });
    }

}