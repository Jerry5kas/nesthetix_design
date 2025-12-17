<?php

namespace App\Providers;

use App\Services\ThemeService;
use App\View\Composers\ThemeComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ThemeService::class, function ($app) {
            return new ThemeService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share theme data with all views
        View::composer('*', ThemeComposer::class);
    }
}
