<?php

namespace Ipitchkhadze\LightPages;

use Illuminate\Support\ServiceProvider;

class LightPagesServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //Routes
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        //Config
        $this->publishes([
            __DIR__ . '/config/lightpages.php' => config_path('lightpages.php'),
        ]);
        //Migrations
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        //Views
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'lightpages');
        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/lightpages'),
        ]);
        //Assets
        $this->publishes([
            __DIR__ . '/resources/assets' => public_path('vendor/lightpages'),
                ], 'public');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        
    }

}
