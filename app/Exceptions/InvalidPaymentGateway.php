<?php

namespace App\Exceptions;

use Exception;

class InvalidPaymentGateway extends Exception
{
    public function __construct($message = "Invalid Payment Gateway")
    {
        parent::__construct($message);
    }
}
