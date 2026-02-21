<?php

namespace App\Factories\Payments\Gateways;

class AcmeBankGateway
{
    private array $credentials = [];
    public function __construct()
    {
        $this->credentials = config('payment.gateways.acme_bank');
    }

    public function pay(float $amount,array $data = []): array
    {
        return [];
    }

    public function processWebhookRequest(array $request): array
    {
        return [];
    }
}
