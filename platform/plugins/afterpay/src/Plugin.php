<?php

namespace Botble\AfterPay;

use Botble\PluginManagement\Abstracts\PluginOperationAbstract;
use Botble\Setting\Models\Setting;

class Plugin extends PluginOperationAbstract
{
    public static function remove(): void
    {
        Setting::query()
            ->whereIn('key', [
                'payment_afterpay_name',
                'payment_afterpay_description',
                'payment_afterpay_client_id',
                'payment_afterpay_client_secret',
                'payment_afterpay_mode',
                'payment_afterpay_status',
            ])
            ->delete();
    }
}
