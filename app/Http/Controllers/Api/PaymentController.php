<?php

namespace App\Http\Controllers\Api;

use App\Facades\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Payments\MakePaymentRequest;
use App\Services\PaymentServices;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    public function __construct(private readonly PaymentServices $paymentServices){}

    public function makePayment(MakePaymentRequest $request)
    {
        $result = $this->paymentServices->makePayment($request->validated());

        return ApiResponse::jsonResponse(
            message: "Payment Processed Successfully",
            code: Response::HTTP_OK,
            data: $result,
        );
    }
}
