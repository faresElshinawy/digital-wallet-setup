<?php

namespace App\Factories\Payments\Gateways;

use Illuminate\Support\Str;

abstract class BaseGateway
{
    public function preparePayload($data)
    {
        return [
            'transfer_info' => [
                'reference' => Str::uuid(),
                'date'      => substr(now()->format('Y-m-d H:i:sO'), 0, -3),
                'amount'    => number_format($data['amount'],2),
                'currency'  => $data['currency']
            ],
            'sender_info' => [
                'account_number' => $data['sender_account_number']
            ],
            'receiver_info' => [
                'bank_code' => $data['bank_code'],
                'account_number' => $data['receiver_account_number'],
                'beneficiary_name' => Str::title($data['beneficiary_name'])
            ],
            'notes' => $data['notes'],
            'payment_type' => $data['payment_type'],
            'charge_details' => $data['charge_type']
        ];
    }
}
