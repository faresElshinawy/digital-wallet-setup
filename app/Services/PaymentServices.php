<?php

namespace App\Services;

use App\Facades\PaymentGateway;
use App\Jobs\ProcessPaymentWebhooksJob;
use App\Pipes\Payments\PreparePaymentRequestPayload;
use App\Pipes\Payments\ProcessPayment;
use App\Pipes\Payments\ProcessTransactionLogging;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Bus;

class PaymentServices
{
    public function makePayment(array $data): array
    {
        return app(Pipeline::class)
        ->send($data)
        ->through([
            PreparePaymentRequestPayload::class,
            ProcessPayment::class,
            ProcessTransactionLogging::class
        ])->thenReturn();
    }

    public function processWebhook(string $paymentGateway,string $payload): void
    {
        $transactions = PaymentGateway::make($paymentGateway)->processWebhook($payload);

        $jobs = collect($transactions)
            ->chunk(config('payment.webhook_settings.processing_chunk_size'))
            ->map(fn($transactionsChunk) => new ProcessPaymentWebhooksJob($paymentGateway,$transactionsChunk->toArray()))
            ->toArray();

        Bus::batch($jobs)
            ->name('Payment Webhook Processing For ' . $paymentGateway)
            ->onConnection('database')
            ->dispatch();
    }
}
