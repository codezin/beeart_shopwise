@if (setting('payment_afterpay_status') == 1)
    <li class="list-group-item">
        <input class="magic-radio js_payment_method" type="radio" name="payment_method" id="payment_afterpay"
               value="afterpay"
               @if ($selecting == AFTERPAY_PAYMENT_METHOD_NAME) checked @endif>
        <label for="payment_afterpay" class="text-start">{{ setting('payment_afterpay_name', trans('plugins/payment::payment.payment_via_afterpay')) }}</label>
        <div class="payment_afterpay_wrap payment_collapse_wrap collapse @if ($selecting == AFTERPAY_PAYMENT_METHOD_NAME) show @endif" style="padding: 15px 0;">
            <p>{!! BaseHelper::clean(setting('payment_afterpay_description')) !!}</p>

            @php $supportedCurrencies = (new \Botble\AfterPay\Services\Gateways\AfterPayPaymentService)->supportedCurrencyCodes(); @endphp
            @if (function_exists('get_application_currency') && !in_array(get_application_currency()->title, $supportedCurrencies) && !get_application_currency()->replicate()->where('title', 'USD')->exists())
                <div class="alert alert-warning" style="margin-top: 15px;">
                    {{ __(":name doesn't support :currency. List of currencies supported by :name: :currencies.", ['name' => 'AfterPay', 'currency' => get_application_currency()->title, 'currencies' => implode(', ', $supportedCurrencies)]) }}

                    <div style="margin-top: 10px;">
                        {{ __('Learn more') }}: <a href="https://developer.afterpay.com/docs/api/reference/currency-codes" target="_blank" rel="nofollow">https://developer.afterpay.com/docs/api/reference/currency-codes</a>
                    </div>

                    @php
                        $currencies = get_all_currencies();

                        $currencies = $currencies->filter(function ($item) use ($supportedCurrencies) { return in_array($item->title, $supportedCurrencies); });
                    @endphp
                    @if (count($currencies))
                        <div style="margin-top: 10px;">{{ __('Please switch currency to any supported currency') }}:&nbsp;&nbsp;
                            @foreach ($currencies as $currency)
                                <a href="{{ route('public.change-currency', $currency->title) }}" @if (get_application_currency_id() == $currency->id) class="active" @endif><span>{{ $currency->title }}</span></a>
                                @if (!$loop->last)
                                    &nbsp; | &nbsp;
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

        </div>
    </li>
@endif
