<?php

namespace App\Jobs;

use App\Facades\PaymentGateway;
use App\Models\Transaction;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class ProcessPaymentWebhooksJob implements ShouldQueue
{
    use Queueable,Batchable;

    /**
     * Create a new job instance.
     */
    public function __construct(private readonly string $paymentGateway,private readonly array $transactions)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach($this->transactions as $transactionData)
        {
            Transaction::updateOrCreate([
                'transaction_id' => $transactionData['reference']
            ],[
                'provider' => $this->paymentGateway,
                'amount'   => $transactionData['amount'],
                'webhook_response' => $transactionData
            ]);
        }
    }
}
