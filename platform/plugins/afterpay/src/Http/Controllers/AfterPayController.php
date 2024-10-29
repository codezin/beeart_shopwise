<?php

namespace Botble\AfterPay\Http\Controllers;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\AfterPay\Http\Requests\AfterPayPaymentCallbackRequest;
use Botble\AfterPay\Services\Gateways\AfterPayPaymentService;
use Botble\Payment\Supports\PaymentHelper;
use Illuminate\Routing\Controller;

class AfterPayController extends Controller
{
    public function getCallback(
        AfterPayPaymentCallbackRequest $request,
        AfterPayPaymentService $payPalPaymentService,
        BaseHttpResponse $response
    ) {
        $status = $payPalPaymentService->getPaymentStatus($request);

        if (! $status) {
            return $response
                ->setError()
                ->setNextUrl(PaymentHelper::getCancelURL())
                ->withInput()
                ->setMessage(__('Payment failed!'));
        }

        $payPalPaymentService->afterMakePayment($request->input());

        return $response
            ->setNextUrl(PaymentHelper::getRedirectURL())
            ->setMessage(__('Checkout successfully!'));
    }
}
