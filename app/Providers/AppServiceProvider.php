<?php


namespace App\Providers;

use Illuminate\Support\Facades\View; 
use App\Models\Categories;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

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
        View::composer('*', function ($view) {
            $view->with('categories', Categories::all());
        });

        Blade::if('authsanctum', function () {
            // Laravel'in session tabanlı doğrulamasını kontrol et
            //return Cookie::has('laravel_session') && Cookie::has('XSRF-TOKEN') && Auth::guard('web')->check();
            return Auth::guard('web')->check();
        });
        
        Blade::if('guestSanctum', function () {
            return !Cookie::has('laravel_session') && Cookie::has('XSRF-TOKEN') && Auth::guard('sanctum');
        });


        
    }
}
