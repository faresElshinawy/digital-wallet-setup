<?php

namespace App\Factories\Payments;

use App\Enums\PaymentGateway;
use App\Exceptions\InvalidPaymentGateway;
use App\Factories\Payments\Gateways\AcmeBankGateway;
use App\Factories\Payments\Gateways\PayTechBankGateway;

class PaymentGatewayFactory
{
    public function make(string $paymentGateway)
    {
        $gateway = match($paymentGateway) {
            PaymentGateway::ACME_BANK->value => AcmeBankGateway::class,
            PaymentGateway::PAYTECH_BANK->value => PayTechBankGateway::class,
            default => throw new InvalidPaymentGateway("Invalid Payment Gateway: " . $paymentGateway)
        };

        return app($gateway);
    }
}
