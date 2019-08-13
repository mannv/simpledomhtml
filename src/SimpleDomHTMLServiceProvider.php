<?php

namespace Plum\SimpleDomHTML;

use Illuminate\Support\ServiceProvider;

class SimpleDomHTMLServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'plum');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'plum');
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
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/simpledomhtml.php', 'simpledomhtml');

        // Register the service the package provides.
        $this->app->singleton('simpledomhtml', function ($app) {
            return new SimpleDomHTML;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['simpledomhtml'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/simpledomhtml.php' => config_path('simpledomhtml.php'),
        ], 'simpledomhtml.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/plum'),
        ], 'simpledomhtml.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/plum'),
        ], 'simpledomhtml.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/plum'),
        ], 'simpledomhtml.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
