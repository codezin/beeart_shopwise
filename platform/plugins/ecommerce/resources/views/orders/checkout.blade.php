@extends('plugins/ecommerce::orders.master')
@section('title')
    {{ __('Checkout') }}
@stop
@section('content')
    <link href="{{ asset('public/themes/assets/css/style.css?v=1703268762') }}" rel="stylesheet">
    @if (Cart::instance('cart')->count() > 0)
        @if (is_plugin_active('payment'))
            @include('plugins/payment::partials.header')
        @endif

        {!! Form::open([
            'route' => ['public.checkout.process', $token],
            'class' => 'checkout-form payment-checkout-form',
            'id' => 'checkout-form',
        ]) !!}
        <input id="checkout-token" name="checkout-token" type="hidden" value="{{ $token }}">

        <div class="shopping_cart_template_2 container" id="main-checkout-product-info">
            <div class="row">
                <div class="order-md-2 col-lg-5 col-md-6 right order-1 mt-4">
                    <div class="shop_cart_total" style="padding:30px">
                        <div class="d-block d-sm-none">
                            @include('plugins/ecommerce::orders.partials.logo')
                        </div>
                        <div class="position-relative" id="cart-item">

                            <div class="payment-info-loading" style="display: none;">
                                <div class="payment-info-loading-content">
                                    <i class="fas fa-spinner fa-spin"></i>
                                </div>
                            </div>

                            {!! apply_filters(RENDER_PRODUCTS_IN_CHECKOUT_PAGE, $products) !!}
                            <div class="mb-5 mt-3">
                                @include('plugins/ecommerce::themes.discounts.partials.form')
                            </div>
                            <hr>

                            @php
                                $rawTotal = Cart::instance('cart')->rawTotal();
                                $orderAmount = max($rawTotal - $promotionDiscountAmount - $couponDiscountAmount, 0);
                                $orderAmount += (float) $shippingAmount;
                                if (!empty(get_ecommerce_setting('minimum_order_vat'))) {
                                    $orderAmount += ($orderAmount / 100) * intval(get_ecommerce_setting('minimum_order_vat'));
                                }
                            @endphp

                            <div class="mt-2 p-2">
                                <div class="row">
                                    <div class="col-6">
                                        <p>{{ __('Subtotal') }}:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="price-text sub-total-text text-end">
                                            {{ format_price(Cart::instance('cart')->rawSubTotal()) }} </p>
                                    </div>
                                </div>
                                @if (EcommerceHelper::isTaxEnabled())
                                    <div class="row">
                                        <div class="col-6">
                                            <p>{{ __('Tax') }}:</p>
                                        </div>
                                        <div class="col-6 float-end">
                                            <p class="price-text tax-price-text">
                                                {{ format_price(Cart::instance('cart')->rawTax()) }}</p>
                                        </div>
                                    </div>
                                @endif
                                @if (session('applied_coupon_code'))
                                    <div class="row coupon-information">
                                        <div class="col-6">
                                            <p>{{ __('Coupon code') }}:</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="price-text coupon-code-text"> {{ session('applied_coupon_code') }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if ($couponDiscountAmount > 0)
                                    <div class="row price discount-amount">
                                        <div class="col-6">
                                            <p>{{ __('Coupon code discount amount') }}:</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="price-text total-discount-amount-text">
                                                {{ format_price($couponDiscountAmount) }} </p>
                                        </div>
                                    </div>
                                @endif
                                @if ($promotionDiscountAmount > 0)
                                    <div class="row">
                                        <div class="col-6">
                                            <p>{{ __('Promotion discount amount') }}:</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="price-text"> {{ format_price($promotionDiscountAmount) }} </p>
                                        </div>
                                    </div>
                                @endif
                                @if (!empty($shipping) && Arr::get($sessionCheckoutData, 'is_available_shipping', true))
                                    <div class="row">
                                        <div class="col-6">
                                            <p>{{ __('Shipping fee') }}:</p>
                                        </div>
                                        <div class="col-6 float-end">
                                            <p class="price-text shipping-price-text">{{ format_price($shippingAmount) }}
                                            </p>
                                        </div>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-6">
                                        <p><strong>{{ __('Total') }}</strong>:</p>
                                    </div>
                                    <div class="col-6 float-end">
                                        <p class="total-text raw-total-text" data-price="{{ format_price($rawTotal, null, true) }}">
                                            {{ format_price($orderAmount) }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 mt-4">
                    <div class="d-none d-sm-block">
                        @include('plugins/ecommerce::orders.partials.logo')
                    </div>
                    <div class="form-checkout">
                        <section>
                            <h5 class="checkout-payment-title d-flex justify-content-between">
                                <span> {{ __('Contact info') }} </span>
                                @if (EcommerceHelper::isEnabledGuestCheckout() && !auth('customer')->check())
                                    <p style="font-weight: 100">{{ __('Already have an account?') }} <a href="{{ route('customer.login') }}">{{ __('Login') }}</a></p>
                                @endif
                            </h5>
                            <input id="save-shipping-information-url" type="hidden" value="{{ route('public.checkout.save-information', $token) }}">

                            <div class="billing-address-form-wrapper">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group @error('address.email') has-error @enderror">
                                            <div class="form-input-wrapper">
                                                <input class="form-control" id="address_email" name="address[email]" type="email" value="{{ old('address.email', Arr::get($sessionCheckoutData, 'email')) ?: (auth('customer')->check() ? auth('customer')->user()->email : null) }}" required>
                                                <label for='address_email'>{{ __('Email') }}</label>
                                            </div>
                                            {!! Form::error('address.email', $errors) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group @error('address.phone') has-error @enderror">
                                            <div class="form-input-wrapper">
                                                <input class="form-control" id="address_phone" name="address[phone]" type="tel" value="{{ old('address.phone', Arr::get($sessionCheckoutData, 'phone')) ?: (auth('customer')->check() ? auth('customer')->user()->phone : null) }}" @if (EcommerceHelper::isPhoneFieldOptionalAtCheckout()) required @endif>
                                                <label for='address_phone'>{{ __('Phone') }}</label>
                                            </div>
                                            {!! Form::error('address.phone', $errors) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="form-input-wrapper">
                                                <input class="form-control" id="contact_company" name="address[contact_company]" type="tel" value="{{ old('address.contact_company', Arr::get($sessionCheckoutData, 'contact_company')) }}">
                                                <label for='contact_company'>{{ __('Contact company') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group mb-3 ">

                        <input type="text" name="address[contact_email]" id="contact_email" class="form-control" required value="" placeholder="Email address">

                    </div>
                    <div class="form-group mb-3 ">

                        <input type="text" name="address[contact_phone]" id="contact_phone" class="form-control" required value="" placeholder="Phone number">

                    </div>
                    <div class="form-group mb-3 ">
                        <input type="text" name="address[contact_company]" id="contact_company" class="form-control" value="" placeholder="company name">
                    </div> --}}
                        </section>


                        @if ($isShowAddressForm)
                            <div>
                                <h5 class="checkout-payment-title d-flex justify-content-between">
                                    <span> {{ __('Shipping address') }} </span>
                                </h5>
                                <input id="save-shipping-information-url" type="hidden" value="{{ route('public.checkout.save-information', $token) }}">
                                @include('plugins/ecommerce::orders.partials.address-form', compact('sessionCheckoutData'))
                            </div>
                            <br>
                        @endif

                        @if (EcommerceHelper::isBillingAddressEnabled())
                            <div>
                                <h5 class="checkout-payment-title">{{ __('Billing information') }}</h5>
                                @include('plugins/ecommerce::orders.partials.billing-address-form', compact('sessionCheckoutData'))
                            </div>
                            <br>
                        @endif

                        @if (!is_plugin_active('marketplace'))
                            @if (Arr::get($sessionCheckoutData, 'is_available_shipping', true))
                                <div id="shipping-method-wrapper">
                                    <h5 class="checkout-payment-title">{{ __('Shipping method') }}</h5>
                                    <div class="shipping-info-loading" style="display: none;">
                                        <div class="shipping-info-loading-content">
                                            <i class="fas fa-spinner fa-spin"></i>
                                        </div>
                                    </div>
                                    @if (!empty($shipping))
                                        @php $post_code = 0 @endphp
                                        <div class="payment-checkout-form">
                                            <input name="shipping_option" type="hidden" value="{{ old('shipping_option', $defaultShippingOption) }}">
                                            <ul class="list-group list_payment_method">


                                                @foreach ($shipping as $shippingKey => $shippingItems)
                                                    @foreach ($shippingItems as $shippingOption => $shippingItem)
                                                        @php
                                                            if ($shippingItem['postcode'] > 0) {
                                                                $post_code++;
                                                            }
                                                        @endphp
                                                        @if ($post_code == 1)
                                                            <li class="list-group-item" data-postcode="0" id="tag_ship_delivery">
                                                                <input id="check_delivery" name="shipping_method_delivery" class="magic-radio shipping_method_delivery" type="radio">
                                                                <label for="check_delivery" id="label_check_delivery">
                                                                    <div> <span>DELIVERY</span></div>
                                                                </label>
                                                            </li>
                                                            <style type="text/css">
                                                                #tag_ship_delivery.checked #label_check_delivery:after {
                                                                    content: "";
                                                                    display: block;
                                                                    background: #3e97eb;
                                                                    border-radius: 50%;
                                                                    height: 8px;
                                                                    left: 6px;
                                                                    top: 6px;
                                                                    width: 8px;
                                                                }
                                                            </style>
                                                        @endif
                                                        @include('plugins/ecommerce::orders.partials.shipping-option', [
                                                            'shippingItem' => @$shippingItem,
                                                            'attributes' => [
                                                                'id' => 'shipping-method-' . $shippingKey . '-' . $shippingOption,
                                                                'name' => 'shipping_method',
                                                                'class' => 'magic-radio shipping_method_input',
                                                                'checked' => old('shipping_method', $defaultShippingMethod) == $shippingKey && old('shipping_option', $defaultShippingOption) == $shippingItem['id'],
                                                                'disabled' => Arr::get($shippingItem, 'disabled'),
                                                                'data-option' => $shippingItem['id'],
                                                            ],
                                                        ])
                                                    @endforeach
                                                @endforeach

                                                <li></li>
                                            </ul>
                                        </div>
                                    @else
                                        <p>{{ __('No shipping methods available!') }}</p>
                                    @endif
                                </div>
                                <br>
                            @endif
                        @endif

                        @if (is_plugin_active('payment'))
                            <div class="position-relative">
                                <div class="payment-info-loading" style="display: none;">
                                    <div class="payment-info-loading-content">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </div>
                                </div>
                                <h5 class="checkout-payment-title">{{ __('Payment method') }}</h5>
                                <input name="amount" type="hidden" value="{{ format_price($orderAmount, null, true) }}">
                                <input name="currency" type="hidden" value="{{ strtoupper(get_application_currency()->title) }}">
                                @if (is_plugin_active('payment'))
                                    {!! apply_filters(PAYMENT_FILTER_PAYMENT_PARAMETERS, null) !!}
                                @endif
                                <ul class="list-group list_payment_method">
                                    @if ($orderAmount)
                                        {!! apply_filters(PAYMENT_FILTER_ADDITIONAL_PAYMENT_METHODS, null, [
                                            'amount' => format_price($orderAmount, null, true),
                                            'currency' => strtoupper(get_application_currency()->title),
                                            'name' => null,
                                            'selected' => PaymentMethods::getSelectedMethod(),
                                            'default' => PaymentMethods::getDefaultMethod(),
                                            'selecting' => PaymentMethods::getSelectingMethod(),
                                        ]) !!}

                                        {!! PaymentMethods::render() !!}
                                    @endif
                                    {{-- <li class="list-group-item">
                            <input class="magic-radio js_payment_method" id="payment_apple_pay" name="payment_method" type="radio" value="apple_pay" {{ PaymentMethods::getSelectedMethod()=='apple_pay' ? 'checked' : '' }}>
                            <label class="text-start" for="payment_apple_pay">
                                Apple pay
                                <img src="{{ asset('public/themes/assets/image/icon/apple_pay.svg') }}" style="float:right;margin-left:auto;text-align:right;" />
                            </label>

                        </li>

                        <li class="list-group-item">
                            <input class="magic-radio js_payment_method" id="payment_google_pay" name="payment_method" type="radio" value="google_pay" {{ PaymentMethods::getSelectedMethod()=='google_pay' ? 'checked' : '' }}>
                            <label class="text-start" for="payment_google_pay">
                                Google pay
                                <img src="{{ asset('public/themes/assets/image/icon/google_pay.svg') }}" style="float:right;margin-left:auto;text-align:right;" />
                                        </label>

                                    </li> --}}
                                </ul>
                            </div>
                            <br>
                        @else
                            <input name="amount" type="hidden" value="{{ format_price($orderAmount, null, true) }}">
                        @endif

                        <div class="form-group @if ($errors->has('description')) has-error @endif mb-3">
                            <label class="control-label" for="description">{{ __('Order notes') }}</label>
                            <br>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="{{ __('Notes about your order, e.g. special notes for delivery.') }}">{{ old('description') }}</textarea>
                            {!! Form::error('description', $errors) !!}
                        </div>

                        @if (EcommerceHelper::getMinimumOrderAmount() > Cart::instance('cart')->rawSubTotal())
                            <div class="alert alert-warning">
                                {{ __('Minimum order amount is :amount, you need to buy more :more to place an order!', ['amount' => format_price(EcommerceHelper::getMinimumOrderAmount()), 'more' => format_price(EcommerceHelper::getMinimumOrderAmount() - Cart::instance('cart')->rawSubTotal())]) }}
                            </div>
                        @endif



                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-md-6">
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-md-6 d-none d-md-block" style="line-height: 53px">
                        <a class="text-info" href="{{ route('public.cart') }}"><i class="fas fa-long-arrow-alt-left"></i>
                            <span class="d-inline-block back-to-cart">{{ __('Back to cart') }}</span></a>
                    </div>
                    <div class="col-md-6 checkout-button-group">
                        <span id="other_checkout" style="display: {{ in_array(PaymentMethods::getSelectedMethod(), ['appley_pay', 'google_pay']) ? 'none' : 'block' }}">
                            @if (EcommerceHelper::isValidToProcessCheckout())
                                <button class="btn payment-checkout-btn payment-checkout-btn-step float-end" data-processing-text="{{ __('Processing. Please wait...') }}" data-error-header="{{ __('Error') }}" type="submit">
                                    {{ __('Complete Checkout') }}
                                </button>
                            @else
                                <span class="btn payment-checkout-btn-step float-end disabled">
                                    {{ __('Complete Checkout') }}
                                </span>
                            @endif


                        </span>
                        {{--
                <span id="apple_pay_checkout" style="display: {{ PaymentMethods::getSelectedMethod() == 'appley_pay' ? 'block' : 'none' }}">
                            @include('plugins/ecommerce::orders.checkout.apple_pay')
                        </span>
                <span id="google_pay_checkout" style="display: {{ PaymentMethods::getSelectedMethod() == 'google_pay' ? 'block' : 'none' }}">
                            @include('plugins/ecommerce::orders.checkout.google_pay')
                        </span> --}}
                    </div>
                </div>
                <div class="d-block d-md-none back-to-cart-button-group">
                    <a class="text-info" href="{{ route('public.cart') }}">
                        <i class="fas fa-long-arrow-alt-left"></i>
                        <span class="d-inline-block">{{ __('Back to cart') }}</span>
                    </a>
                </div>

            </div>

            <script>
                // $(document).on("change", ".js_payment_method", function() {
                //     if ($(this).val() == 'apple_pay') {
                //         $("#apple_pay_checkout").show();
                //         $("#google_pay_checkout").hide();
                //         $("#other_checkout").hide();
                //     } else if ($(this).val() == 'google_pay') {
                //         $("#apple_pay_checkout").hide();
                //         $("#google_pay_checkout").show();
                //         $("#other_checkout").hide();
                //     } else {
                //         $("#apple_pay_checkout").hide();
                //         $("#google_pay_checkout").hide();
                //         $("#other_checkout").show();
                //     }
                // });
            </script>
        </div>
        {!! Form::close() !!}

        @if (is_plugin_active('payment'))
            @include('plugins/payment::partials.footer')
        @endif
    @else
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning my-5">
                        <span>{!! __('No products in cart. :link!', ['link' => Html::link(route('public.index'), __('Back to shopping'))]) !!}</span>
                    </div>
                </div>
            </div>
        </div>
    @endif
@stop

@push('footer')
    <script type="text/javascript" src="{{ asset('vendor/core/core/js-validation/js/js-validation.js') }}"></script>
    {!! JsValidator::formRequest(\Botble\Ecommerce\Http\Requests\SaveCheckoutInformationRequest::class, '#checkout-form') !!}
@endpush
