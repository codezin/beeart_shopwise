@php $payPalStatus = setting('payment_afterpay_status'); @endphp
<table class="table payment-method-item">
    <tbody>
    <tr class="border-pay-row">
        <td class="border-pay-col"><i class="fa fa-theme-payments"></i></td>
        <td style="width: 20%;">
            <img class="filter-black" src="{{ url('vendor/core/plugins/afterpay/images/afterpay.svg') }}" alt="AfterPay">
        </td>
        <td class="border-right">
            <ul>
                <li>
                    <a href="https://afterpay.com" target="_blank">AfterPay</a>
                    <p>{{ trans('plugins/payment::payment.afterpay_description') }}</p>
                </li>
            </ul>
        </td>
    </tr>
    <tr class="bg-white">
        <td colspan="3">
            <div class="float-start" style="margin-top: 5px;">
                <div class="payment-name-label-group  @if ($payPalStatus== 0) hidden @endif">
                    <span class="payment-note v-a-t">{{ trans('plugins/payment::payment.use') }}:</span> <label class="ws-nm inline-display method-name-label">{{ setting('payment_afterpay_name') }}</label>
                </div>
            </div>
            <div class="float-end">
                <a class="btn btn-secondary toggle-payment-item edit-payment-item-btn-trigger @if ($payPalStatus == 0) hidden @endif">{{ trans('plugins/payment::payment.edit') }}</a>
                <a class="btn btn-secondary toggle-payment-item save-payment-item-btn-trigger @if ($payPalStatus == 1) hidden @endif">{{ trans('plugins/payment::payment.settings') }}</a>
            </div>
        </td>
    </tr>
    <tr class="afterpay-online-payment payment-content-item hidden">
        <td class="border-left" colspan="3">
            {!! Form::open() !!}
            {!! Form::hidden('type', AFTERPAY_PAYMENT_METHOD_NAME, ['class' => 'payment_type']) !!}
            <div class="row">
                <div class="col-sm-6">
                    <ul>
                        <li>
                            <label>{{ trans('plugins/payment::payment.configuration_instruction', ['name' => 'AfterPay']) }}</label>
                        </li>
                        <li class="payment-note">
                            <p>{{ trans('plugins/payment::payment.configuration_requirement', ['name' => 'AfterPay']) }}:</p>
                            <ul class="m-md-l" style="list-style-type:decimal">
                                <li style="list-style-type:decimal">
                                    <a href="https://www.afterpay.com/vn/merchantsignup/applicationChecklist?signupType=CREATE_NEW_ACCOUNT&amp;productIntentId=email_payments" target="_blank">
                                        {{ trans('plugins/payment::payment.service_registration', ['name' => 'AfterPay']) }}
                                    </a>
                                </li>
                                <li style="list-style-type:decimal">
                                    <p>{{ trans('plugins/payment::payment.after_service_registration_msg', ['name' => 'AfterPay']) }}</p>
                                </li>
                                <li style="list-style-type:decimal">
                                    <p>{{ trans('plugins/payment::payment.enter_client_id_and_secret') }}</p>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <div class="well bg-white">
                        <x-core-setting::text-input
                            name="payment_afterpay_name"
                            :label="trans('plugins/payment::payment.method_name')"
                            :value="setting('payment_afterpay_name', trans('plugins/payment::payment.pay_online_via', ['name' => 'AfterPay']))"
                            data-counter="400"
                        />
                                    
                        <div class="form-group mb-3">
                            <label class="text-title-field" for="payment_afterpay_description">{{ trans('core/base::forms.description') }}</label>
                            <textarea class="next-input form-control form-control editor-ckeditor ays-ignore" name="payment_afterpay_description" id="payment_afterpay_description">{{ get_payment_setting('description', 'afterpay', __('You will be redirected to AfterPay to complete the payment.')) }}</textarea>
                        </div>

                        <p class="payment-note">
                            {{ trans('plugins/payment::payment.please_provide_information') }} <a target="_blank" href="//www.afterpay.com">AfterPay</a>:
                        </p>

                        <x-core-setting::text-input
                            name="payment_afterpay_client_id"
                            :label="trans('plugins/payment::payment.client_id')"
                            :value="app()->environment('demo') ? '*******************************' :setting('payment_afterpay_client_id')"
                        />

                        <x-core-setting::text-input
                            name="payment_afterpay_client_secret"
                            type="password"
                            :label="trans('plugins/payment::payment.client_secret')"
                            :value="app()->environment('demo') ? '*******************************' : setting('payment_afterpay_client_secret')"
                        />

                        <x-core-setting::checkbox
                            name="payment_afterpay_mode"
                            :label="trans('plugins/payment::payment.sandbox_mode')"
                            :value="! setting('payment_afterpay_mode')"
                        />

                        {!! apply_filters(PAYMENT_METHOD_SETTINGS_CONTENT, null, 'afterpay') !!}
                    </div>
                </div>
            </div>
            <div class="col-12 bg-white text-end">
                <button class="btn btn-warning disable-payment-item @if ($payPalStatus == 0) hidden @endif" type="button">{{ trans('plugins/payment::payment.deactivate') }}</button>
                <button class="btn btn-info save-payment-item btn-text-trigger-save @if ($payPalStatus == 1) hidden @endif" type="button">{{ trans('plugins/payment::payment.activate') }}</button>
                <button class="btn btn-info save-payment-item btn-text-trigger-update @if ($payPalStatus == 0) hidden @endif" type="button">{{ trans('plugins/payment::payment.update') }}</button>
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    </tbody>
</table>
