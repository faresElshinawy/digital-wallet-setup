<?php

use Illuminate\Support\Str;

return [
    'gateways' => [
        'acme_bank' => [
            'api_key' => env('ACME_BANK_API_KEY')
        ],
        'paytech_bank' => [
            'api_key' => env('PAYTECH_BANK_API_KEY')
        ],
    ],

    'webhook_settings' => [
        'processing_chunk_size' => 1
    ]
];
