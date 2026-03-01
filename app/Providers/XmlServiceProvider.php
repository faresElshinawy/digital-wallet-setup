<?php

namespace App\Providers;

use App\Services\XmlServices;
use Illuminate\Support\ServiceProvider;

class XmlServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(XmlServices::class,fn () => new XmlServices());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
