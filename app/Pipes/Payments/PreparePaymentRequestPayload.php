<?php

namespace App\Pipes\Payments;

use Closure;


class PreparePaymentRequestPayload
{
    public function handle(array $data, Closure $next)
    {
        return $next($data);
    }
}
