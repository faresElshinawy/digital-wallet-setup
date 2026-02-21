<?php

namespace App\Pipes\Payments;

use Closure;


class ProcessPayment
{
    public function handle(array $data, Closure $next)
    {
        return $next($data);
    }
}
