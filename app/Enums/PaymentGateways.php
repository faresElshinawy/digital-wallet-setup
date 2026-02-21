<?php

namespace App\Enums;

enum PaymentGateways: string
{
    case ACME_BANK = 'acme';
    case PAYTECH_BANK = 'paytech';
}
