<?php

namespace App\Http\Requests\Api\Payments;

use App\Enums\ChargeType;
use App\Enums\Currency;
use App\Enums\PaymentGateway;
use App\Enums\PaymentType;
use Dom\CharacterData;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MakePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'payment_gateway' => ['required',Rule::enum(PaymentGateway::class)],
            'amount'          => ['required','numeric','gt:0'],
            'currency'        => ['required',Rule::enum(Currency::class)],
            'sender_account_number'  => ['required','string','min:34','max:34'],
            'bank_code'              => ['required','between:8,11'],
            'receiver_account_number'  => ['required','string','min:34','max:34'],
            'beneficiary_name'         => ['required','string','max:255'],
            'notes'                    => ['sometimes','array'],
            'notes.*'                  => ['required','string'],
            'charge_type'              => ['required',Rule::enum(ChargeType::class)],
            'payment_type'             => ['required',Rule::enum(PaymentType::class)],
        ];
    }
}
