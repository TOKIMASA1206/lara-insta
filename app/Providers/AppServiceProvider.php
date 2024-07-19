<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        Gate::define('admin', function ($user) {
            return $user->role_id === 1;
        });


         // Bootstrapのデザインを使う
         Paginator::useBootstrap();
    }
}
