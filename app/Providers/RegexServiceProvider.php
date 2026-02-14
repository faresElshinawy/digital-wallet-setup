<?php

namespace App\Providers;

use App\Services\RegexServices;
use Illuminate\Support\ServiceProvider;

class RegexServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RegexServices::class,fn () => new RegexServices());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
