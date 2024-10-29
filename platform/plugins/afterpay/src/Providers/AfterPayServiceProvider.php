<?php

namespace Botble\AfterPay\Providers;

use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Support\ServiceProvider;

class AfterPayServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot(): void
    {
        if (is_plugin_active('payment')) {
            $this->setNamespace('plugins/afterpay')
                ->loadHelpers()
                ->loadRoutes()
                ->loadAndPublishViews()
                ->publishAssets();

            $this->app->register(HookServiceProvider::class);
        }
    }
}
