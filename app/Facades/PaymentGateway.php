<?php

namespace App\Facades;

use App\Factories\Payments\PaymentGatewayFactory;
use Illuminate\Support\Facades\Facade;

class PaymentGateway extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return PaymentGatewayFactory::class;
    }
}
