<?php

namespace KeyCDN\Tests;

use KeyCDN\KeyCDNServiceProvider;

/**
 * Class KeyCDNServiceProviderTest
 * @package KeyCDN\Tests
 */
class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @param $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [KeyCDNServiceProvider::class];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('keycdn.key', 'KEYCDN_KEY');
    }
}