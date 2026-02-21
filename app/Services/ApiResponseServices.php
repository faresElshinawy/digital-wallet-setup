<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response;

class ApiResponseServices
{
    public function jsonResponse(
        string $message = "Action Performed Successfully",
        int $code = Response::HTTP_OK,
        array|object|null $data = null,
        array|object|null $errors = null
    )
    {
        return response()->json([
            'message' => $message,
            'code'    => $code,
            'data'    => $data,
            'errors'  => $errors
        ]);
    }
}
