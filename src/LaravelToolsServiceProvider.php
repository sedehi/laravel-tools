<?php

namespace Sedehi\LaravelTools;

use Illuminate\Support\ServiceProvider;

class LaravelToolsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'sedehi');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'sedehi');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-tools.php', 'laravel-tools');

        // Register the service the package provides.
        $this->app->singleton('laravel-tools', function ($app) {
            return new LaravelTools;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-tools'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravel-tools.php' => config_path('laravel-tools.php'),
        ], 'laravel-tools.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/sedehi'),
        ], 'laravel-tools.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/sedehi'),
        ], 'laravel-tools.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/sedehi'),
        ], 'laravel-tools.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
