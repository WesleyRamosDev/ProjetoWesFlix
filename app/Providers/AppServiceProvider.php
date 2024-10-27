<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

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
        $this->loadViewsFrom(resource_path('views/emails'), 'emails');
        
        Password::defaults(function () {
            $rule = Password::min(6)->max(64)->numbers();

            return $this->app->isProduction()
                ? $rule->uncompromised()
                : $rule->uncompromised();
        });
    }
}
