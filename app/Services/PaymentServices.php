<?php

namespace App\Services;

use App\Pipes\Payments\PreparePaymentRequestPayload;
use App\Pipes\Payments\ProcessPayment;
use App\Pipes\Payments\ProcessTransactionLogging;
use Illuminate\Pipeline\Pipeline;

class PaymentServices
{
    public function makePayment(array $data)
    {
        return app(Pipeline::class)
        ->send($data)
        ->through([
            PreparePaymentRequestPayload::class,
            ProcessPayment::class,
            ProcessTransactionLogging::class
        ])->thenReturn();
    }
}
