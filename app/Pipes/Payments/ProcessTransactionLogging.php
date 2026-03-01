<?php

namespace App\Pipes\Payments;

use App\Models\Transaction;
use Closure;
use Illuminate\Support\Facades\Log;


class ProcessTransactionLogging
{
    public function handle(array $data, Closure $next)
    {
        Transaction::Create([
            'transaction_id' => $data['payment_result']['transaction_id'],
            'idempotency_key'=> request()->header('idempotency-key'),
            'provider' => $data['payment_gateway'],
            'amount'   => $data['amount'],
            'processing_response' => $data['payment_result']
        ]);
        Log::info("\n" . $data['payment_request_payload']);

        return $next($data);
    }
}
