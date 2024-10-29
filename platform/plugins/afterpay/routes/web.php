<?php

use Botble\AfterPay\Http\Controllers\AfterPayController;
use Illuminate\Support\Facades\Route;

Route::group(['controller' => AfterPayController::class, 'middleware' => ['web', 'core']], function () {
    Route::get('payment/afterpay/status', 'getCallback')->name('payments.afterpay.status');
});
