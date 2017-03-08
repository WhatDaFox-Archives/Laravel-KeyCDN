<?php

namespace KeyCDN;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use KeyCDN\Facades\KeyCDN;

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
        ], 'keycdn');
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

        $this->app->booting(function() {
            $loader = AliasLoader::getInstance();
            $loader->alias('KeyCDN', KeyCDN::class);
        });
    }

}