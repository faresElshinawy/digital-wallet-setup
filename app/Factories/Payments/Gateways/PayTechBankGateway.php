<?php

namespace App\Factories\Payments\Gateways;

class PayTechBankGateway
{
    private array $credentials = [];

    public function __construct()
    {
        $this->credentials = config('payment.gateways.paytech_bank');
    }

    public function pay(float $amount,array $data = []): array
    {

        dd($this->credentials);
        return [
            'amount' => $amount
        ];
    }

    public function processWebhookRequest(array $request): array
    {
        return [];
    }
}
