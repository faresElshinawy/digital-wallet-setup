<?php

namespace App\Factories\Payments\Gateways;

use App\Facades\Regex;
use App\Factories\Contracts\PaymentGateway;
use App\Factories\Payments\Gateways\BaseGateway;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PayTechBankGateway extends BaseGateway implements PaymentGateway
{
    private array $credentials = [];

    public function __construct()
    {
        $this->credentials = config('payment.gateways.paytech_bank');
    }

    public function pay(float $amount,array $data = []): array
    {
        return [
            'message' => __('Payment Processed Successfully'),
            'amount'  => $data['amount'],
            'transaction_id' => Str::uuid()
        ];
    }

    public function processWebhook(string $payload): array
    {
        return collect(explode('\n',Regex::clearMultipleLinesString($payload)))->map(function ($content) {
            return Regex::matchMany('/^(?<date>\d+),(?<amount>\d+(?:,\d{2})?)#(?<reference>\d+)#(?<pairs>.+)$/',trim($content),[
            'date','amount','reference','pairs'
        ],fn($matches) => array_merge($matches,Regex::matchPairs('/([^\/]+)\/([^\/]+)(?=\/[^\/]+\/|$)/',$matches['pairs'] ?? '')));
        })->toArray();
    }
}
