<?php

use App\Facades\Payment;
use App\Facades\PaymentGateway;
use App\Facades\Regex;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test-regex', function () {
        // 156,50//202506159000001//20250615
        $result = Regex::matchMany('^(?P<amount>\d+,\d{2})\/\/(?P<reference>\d+)\/\/(?P<date>\d{8})$^','156,50//202506159000001//20250615',[
            'amount','reference','date'
        ]);
        dd($result);
        // '/^(?<date>\d+),(?<amount>\d+\.\d{2})#(?<reference>\d+)#(?<pairs>.+)$/' | '/([^\/]+)\/([^\/]+)/'
    $result = Regex::matchMany('/^(?<date>\d+),(?<amount>\d+)#(?<reference>\d+)#(?<pairs>.+)$/','20250615156,50#202506159000001#note/debt payment march/internal_reference/A462JE81',[
        'date','amount','reference','pairs'
    ],fn($matches) => array_merge($matches,Regex::matchPairs('/([^\/]+)\/([^\/]+)/',$matches['pairs'] ?? '')));
    return $result;
});


Route::get('/test-payment', function () {
    $paymentGateway = PaymentGateway::make('paytech');
    return $paymentGateway->pay(50);
});
