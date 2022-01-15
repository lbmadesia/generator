<?php

namespace Lbmadesia\Generator\Provider;

use Illuminate\Support\ServiceProvider;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'generator');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'generator');
        $this->mergeConfigFrom(__DIR__ . '/../config/generator.php', 'generator');

        $this->publishes([
            __DIR__ . '/../config/generator.php' => config_path('generator.php'),
        ], 'generator');
        $this->publishes([
            __DIR__.'/../views' => base_path('resources/views/vendor/generator'),
        ]);

        // Load the Breadcrumbs for the package
        if (class_exists('Breadcrumbs')) {
            require __DIR__ . '/../breadcrumbs.php';
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/../routes.php';
        require_once(__DIR__.'/../helpers.php');
        $this->app->make('Lbmadesia\Generator\Module');
        $this->app->make('Lbmadesia\Generator\Controllers\Generator');
        $this->app->make('Lbmadesia\Generator\Controllers\ModuleController');
        $this->app->make('Lbmadesia\Generator\Repositories\ModuleRepository');
        $this->app->make('Lbmadesia\Generator\Controllers\ModuleTableController');
    }
}
