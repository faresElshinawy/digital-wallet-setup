<?php

namespace App\Exceptions;

use Exception;

class CircularHandlerChainDeducted extends Exception
{
    public function __construct($message = "Circular chain deducted")
    {
        parent::__construct($message);
    }
}
