<?php

namespace NetLinker\HighSender;

use Illuminate\Support\ServiceProvider;
use NetLinker\HighSender\Middleware\OwnerApiMiddleware;
use NetLinker\HighSender\Middleware\OwnerWebMiddleware;

class HighSenderServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'high-sender');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'high-sender');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

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
        $this->mergeConfigFrom(__DIR__ . '/../config/high-sender.php', 'high-sender');

        // Register the service the package provides.
        $this->app->singleton('high-sender', function ($app) {
            return new HighSender();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['high-sender'];
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
            __DIR__ . '/../config/high-sender.php' => config_path('high-sender.php'),
        ], 'config');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/high-sender'),
        ], 'views');

        // Publishing assets.
        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/high-sender'),
        ], 'views');

        // Publishing the translation files.
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/high-sender'),
        ], 'views');

        // Registering package commands.
        $this->commands([]);
    }

}
