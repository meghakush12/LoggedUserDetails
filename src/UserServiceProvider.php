<?php

namespace Userdetails\Loggeduser;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Userdetails\Loggeduser\EventServiceProvider;


class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(EventServiceProvider::class);
        $this->mergeConfigFrom(__DIR__.'/config/loggeduser.php', 'loggeduser');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'loggeduser');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->registerRoutes();

        // $this->publishes([__DIR__.'/database/migrations/' => database_path('migrations')], 'loggeduser-migrations');

        // $this->publishes([__DIR__.'/resources/views' => resource_path('views')], 'loggeduser-views');

        // // $this->publishes([__DIR__.'/' => app_path('Providers')], 'loggeduser-Providers');

        // $this->publishes([__DIR__.'/Http/Controllers' => app_path('Http/Controllers')],  'loggeduser-Controllers');

        // $this->publishes([__DIR__.'/Listeners' => app_path('/Listeners')], 'loggeduser-Listeners');

        // $this->publishes([__DIR__.'/routes/web.php' => base_path('routes/web.php')], 'loggeduser-routes');

        $this->publishes([__DIR__.'/config/loggeduser.php' => config_path('loggeduser.php'), 'loggeduser-config']);

    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('loggeduser.prefix'),
            'middleware' => config('loggeduser.middleware'),
        ];
    }

}
