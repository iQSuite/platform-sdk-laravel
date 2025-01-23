<?php

namespace IQSuite\Platform;
use Illuminate\Support\ServiceProvider;
use IQSuite\Platform\IQSuiteClient;

class IQSuitePlatformServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(IQSuiteClient::class, function ($app) {
            return new IQSuiteClient();
        });

        $this->app->bind('iqsuite', function($app) {
            return new IQSuiteClient();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/iqsuite.php' => config_path('iqsuite.php'),
        ], 'iqsuite-config');
    }
}