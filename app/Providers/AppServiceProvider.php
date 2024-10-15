<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Example: Register a singleton service
        $this->app->singleton(SomeClass::class, function ($app) {
            return new SomeClass();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set default string length for MySQL/MariaDB to avoid key length issues
        Schema::defaultStringLength(191);

        // Force HTTPS in production environment
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Share a variable across all views
        View::share('appName', 'Aplikasi Tabungan Pelajar');
    }
    public function map()
{
    $this->mapApiRoutes();

    $this->mapWebRoutes();
}

protected function mapApiRoutes()
{
    Route::prefix('api')
         ->middleware('api')
         ->namespace($this->namespace)
         ->group(base_path('routes/api.php'));
}
}
