<?php

namespace App\Facades;

use App\Services\RegexServices;
use Illuminate\Support\Facades\Facade;

class Regex extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return RegexServices::class;
    }
}
