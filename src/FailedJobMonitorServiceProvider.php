<?php

namespace MadeITBelgium\LaravelFailedJobMonitor;

use Illuminate\Support\ServiceProvider;

/**
 * Laravel Failed job monitor.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2017 Made I.T. (http://www.madeit.be)
 * @author     Made I.T. <info@madeit.be>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */
class FailedJobMonitorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-failed-job-monitor.php' => config_path('laravel-failed-job-monitor.php'),
        ], 'config');

        $this->app->make(FailedJobNotifier::class)->register();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-failed-job-monitor.php',
            'laravel-failed-job-monitor'
        );
        $this->app->singleton(FailedJobNotifier::class);
    }
}
