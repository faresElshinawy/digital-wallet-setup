<?php

namespace App\Factories\Contracts;

interface PaymentGateway
{
    public function pay(float $amount,array $data = []): array;
    public function processWebhook(string $payload): array;
}
