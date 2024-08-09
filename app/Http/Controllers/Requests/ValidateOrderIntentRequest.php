<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class ValidateOrderItentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'order_intent_id' => ['required', 'exists:order_intents,id'],
            'order_payment' => ['required', 'string'],
            'order_info' => ['required', 'string'],
        ];
    }
}
