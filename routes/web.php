<?php

use App\Facades\Regex;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test-regex', function () {
        // '/^(?<date>\d+),(?<amount>\d+\.\d{2})#(?<reference>\d+)#(?<pairs>.+)$/' | '/([^\/]+)\/([^\/]+)/'
    $result = Regex::matchMany('/^(?<date>\d+),(?<amount>\d+)#(?<reference>\d+)#(?<pairs>.+)$/','20250615156,50#202506159000001#note/debt payment march/internal_reference/A462JE81',[
        'date','amount','reference','pairs'
    ],fn($matches) => array_merge($matches,Regex::matchPairs('/([^\/]+)\/([^\/]+)/',$matches['pairs'] ?? '')));
    dd($result);
});
