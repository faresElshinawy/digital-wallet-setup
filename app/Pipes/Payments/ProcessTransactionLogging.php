<?php

namespace App\Pipes\Payments;

use Closure;


class ProcessTransactionLogging
{
    public function handle(array $data, Closure $next)
    {
        return $next($data);
    }
}
