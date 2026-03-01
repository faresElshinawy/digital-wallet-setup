<?php

namespace App\Enums;

enum PaymentGateway: string
{
    case ACME_BANK = 'acme';
    case PAYTECH_BANK = 'paytech';
}
