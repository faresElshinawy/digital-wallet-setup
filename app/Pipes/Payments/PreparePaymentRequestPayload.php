<?php

namespace App\Pipes\Payments;

use App\Facades\PaymentGateway;
use App\Facades\Xml;
use App\Services\XmlServices;
use App\Services\YamlServices;
use Closure;
use Illuminate\Support\Str;


class PreparePaymentRequestPayload
{
    public function handle(array $data, Closure $next)
    {
        $payload = PaymentGateway::make($data['payment_gateway'])->preparePayload($data);

        $data['payment_request_payload'] = Xml::generate($payload ,1.0,'utf-8','PaymentRequestMessage');

        return $next($data);
    }
}
