<?php

namespace App\Facades;

use App\Services\ApiResponseServices;
use App\Services\XmlServices;
use Illuminate\Support\Facades\Facade;

class Xml extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return XmlServices::class;
    }
}
