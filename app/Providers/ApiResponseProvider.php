<?php

namespace App\Providers;

use App\Services\ApiResponseServices;
use Illuminate\Support\ServiceProvider;

class ApiResponseProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ApiResponseServices::class,fn () => new ApiResponseServices());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
