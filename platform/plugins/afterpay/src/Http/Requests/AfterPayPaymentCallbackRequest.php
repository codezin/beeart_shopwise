<?php

namespace Botble\AfterPay\Http\Requests;

use Botble\Support\Http\Requests\Request;

class AfterPayPaymentCallbackRequest extends Request
{
    public function rules(): array
    {
        return [
            'amount' => 'required|numeric',
            'currency' => 'required',
        ];
    }
}
