<?php

namespace Tests;

use Orchestra\Testbench\TestCase;

class BaseTest extends TestCase
{

    use CreatesApplication;

    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        parent::setUp();
        $this->artisan('migrate');
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }
}