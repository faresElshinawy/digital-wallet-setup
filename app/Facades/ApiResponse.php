<?php

namespace App\Facades;

use App\Services\ApiResponseServices;
use Illuminate\Support\Facades\Facade;

class ApiResponse extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return ApiResponseServices::class;
    }
}
