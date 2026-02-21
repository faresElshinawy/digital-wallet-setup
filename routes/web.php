<?php

use App\Facades\Payment;
use App\Facades\Regex;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


