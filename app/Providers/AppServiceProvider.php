<?php

namespace App\Providers;

use App\Services\Counter;
use App\View\Composers\ActivityComposer;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Blade::componentNamespace('components.badge', 'badge');
        // Blade::componentNamespace('components.updated', Updated::class);

        $this->app->singleton(Counter::class, function ($app) {
            return new Counter(
                $app->make('Illuminate\Contracts\Cache\Factory'),
                $app->make('Illuminate\Contracts\Session\Session'),
                env('TIMEOUT_COUNTER')
            );
        });

        // $this->app->when(Counter::class)->needs('$timeout')->give(env('TIMEOUT_COUNTER'));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['posts.index', 'posts.show'], ActivityComposer::class);
    }
}