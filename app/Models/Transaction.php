<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_id',
        'idempotency_key',
        'provider',
        'amount',
        'processing_response',
        'webhook_response'
    ];

    protected $casts = [
        'processing_response' => 'json',
        'webhook_response' => 'json',
    ];
}
