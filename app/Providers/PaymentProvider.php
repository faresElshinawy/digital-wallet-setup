<?php

namespace App\Providers;

use App\Factories\Payments\PaymentGatewayFactory;
use Illuminate\Support\ServiceProvider;

class PaymentProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentGatewayFactory::class,fn () => new PaymentGatewayFactory());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
