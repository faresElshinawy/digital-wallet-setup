<?php

namespace App\Pipes\Payments;

use App\Facades\PaymentGateway;
use Closure;


class ProcessPayment
{
    public function handle(array $data, Closure $next)
    {
        $result = PaymentGateway::make($data['payment_gateway'])->pay($data['amount'],$data);

        $data['payment_result'] = $result;

        return $next($data);
    }
}
