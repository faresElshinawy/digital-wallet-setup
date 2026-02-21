<?php

use App\Http\Controllers\Api\PaymentController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'payments'
],function (){
    Route::post('make',[PaymentController::class,'makePayment'])->middleware('idempotency');
});
