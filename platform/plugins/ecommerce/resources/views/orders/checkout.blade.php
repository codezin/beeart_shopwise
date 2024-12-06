@extends('plugins/ecommerce::orders.master')
@section('title')
    {{ __('Checkout') }}
@stop
@section('content')
    <link href="{{ asset('public/themes/assets/css/style.css?v=1703268762') }}"
        rel="stylesheet">
    @if (Cart::instance('cart')->count() > 0)
        @if (is_plugin_active('payment'))
            @include('plugins/payment::partials.header')
        @endif

        {!! Form::open([
            'route' => ['public.checkout.process', $token],
            'class' => 'checkout-form payment-checkout-form',
            'id' => 'checkout-form',
        ]) !!}
        <input id="checkout-token"
            name="checkout-token"
            type="hidden"
            value="{{ $token }}">

        <div class="shopping_cart_template_2 container"
            id="main-checkout-product-info">
            <div class="row">
                <div class="order-md-2 col-lg-5 col-md-6 right order-1 mt-4">
                    <div class="shop_cart_total"
                        style="padding:30px">
                        <div class="d-block d-sm-none">
                            @include('plugins/ecommerce::orders.partials.logo')
                        </div>
                        <div class="position-relative"
                            id="cart-item">

                            <div class="payment-info-loading"
                                style="display: none;">
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
                                        <p class="total-text raw-total-text"
                                            data-price="{{ format_price($rawTotal, null, true) }}">
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
                            <input id="save-shipping-information-url"
                                type="hidden"
                                value="{{ route('public.checkout.save-information', $token) }}">

                            <div class="billing-address-form-wrapper">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group @error('address.email') has-error @enderror">
                                            <div class="form-input-wrapper">
                                                <input class="form-control"
                                                    id="address_email"
                                                    name="address[email]"
                                                    type="email"
                                                    value="{{ old('address.email', Arr::get($sessionCheckoutData, 'email')) ?: (auth('customer')->check() ? auth('customer')->user()->email : null) }}"
                                                    required>
                                                <label for='address_email'>{{ __('Email') }}</label>
                                            </div>
                                            {!! Form::error('address.email', $errors) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group @error('address.phone') has-error @enderror">
                                            <div class="form-input-wrapper">
                                                <input class="form-control"
                                                    id="address_phone"
                                                    name="address[phone]"
                                                    type="tel"
                                                    value="{{ old('address.phone', Arr::get($sessionCheckoutData, 'phone')) ?: (auth('customer')->check() ? auth('customer')->user()->phone : null) }}"
                                                    @if (EcommerceHelper::isPhoneFieldOptionalAtCheckout()) required @endif>
                                                <label for='address_phone'>{{ __('Phone') }}</label>
                                            </div>
                                            {!! Form::error('address.phone', $errors) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="form-input-wrapper">
                                                <input class="form-control"
                                                    id="contact_company"
                                                    name="address[contact_company]"
                                                    type="tel"
                                                    value="{{ old('address.phone', Arr::get($sessionCheckoutData, 'contact_company')) }}">
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
                                <input id="save-shipping-information-url"
                                    type="hidden"
                                    value="{{ route('public.checkout.save-information', $token) }}">
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
                                    <div class="shipping-info-loading"
                                        style="display: none;">
                                        <div class="shipping-info-loading-content">
                                            <i class="fas fa-spinner fa-spin"></i>
                                        </div>
                                    </div>
                                    @if (!empty($shipping))
                                        <div class="payment-checkout-form">
                                            <input name="shipping_option"
                                                type="hidden"
                                                value="{{ old('shipping_option', $defaultShippingOption) }}">
                                            <ul class="list-group list_payment_method">


                                                @foreach ($shipping as $shippingKey => $shippingItems)
                                                    @foreach ($shippingItems as $shippingOption => $shippingItem)
                                                        @include('plugins/ecommerce::orders.partials.shipping-option', [
                                                            'shippingItem' => @$shippingItem['id'],
                                                            'attributes' => [
                                                                'id' => 'shipping-method-' . $shippingKey . '-' . $shippingOption,
                                                                'name' => 'shipping_method',
                                                                'class' => 'magic-radio shipping_method_input',
                                                                'checked' => old('shipping_method', $defaultShippingMethod) == $shippingKey && old('shipping_option', $defaultShippingOption) == $shippingKey,
                                                                'disabled' => Arr::get($shippingItem, 'disabled'),
                                                                'data-option' =>  $shippingKey,
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
                                <div class="payment-info-loading"
                                    style="display: none;">
                                    <div class="payment-info-loading-content">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </div>
                                </div>
                                <h5 class="checkout-payment-title">{{ __('Payment method') }}</h5>
                                <input name="amount"
                                    type="hidden"
                                    value="{{ format_price($orderAmount, null, true) }}">
                                <input name="currency"
                                    type="hidden"
                                    value="{{ strtoupper(get_application_currency()->title) }}">
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
                                        <input class="magic-radio js_payment_method"
                                            id="payment_apple_pay"
                                            name="payment_method"
                                            type="radio"
                                            value="apple_pay"
                                            {{ PaymentMethods::getSelectedMethod() == 'apple_pay' ? 'checked' : '' }}>
                                        <label class="text-start"
                                            for="payment_apple_pay">
                                            Apple pay
                                            <img src="{{ asset('public/themes/assets/image/icon/apple_pay.svg') }}"
                                                style="float:right;margin-left:auto;text-align:right;" />
                                        </label>

                                    </li>

                                    <li class="list-group-item">
                                        <input class="magic-radio js_payment_method"
                                            id="payment_google_pay"
                                            name="payment_method"
                                            type="radio"
                                            value="google_pay"
                                            {{ PaymentMethods::getSelectedMethod() == 'google_pay' ? 'checked' : '' }}>
                                        <label class="text-start"
                                            for="payment_google_pay">
                                            Google pay
                                            <img src="{{ asset('public/themes/assets/image/icon/google_pay.svg') }}"
                                                style="float:right;margin-left:auto;text-align:right;" />
                                        </label>

                                    </li> --}}
                                </ul>
                            </div>
                            <br>
                        @else
                            <input name="amount"
                                type="hidden"
                                value="{{ format_price($orderAmount, null, true) }}">
                        @endif

                        <div class="form-group @if ($errors->has('description')) has-error @endif mb-3">
                            <label class="control-label"
                                for="description">{{ __('Order notes') }}</label>
                            <br>
                            <textarea class="form-control"
                                id="description"
                                name="description"
                                rows="3"
                                placeholder="{{ __('Notes about your order, e.g. special notes for delivery.') }}">{{ old('description') }}</textarea>
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
                    <div class="col-md-6 d-none d-md-block"
                        style="line-height: 53px">
                        <a class="text-info"
                            href="{{ route('public.cart') }}"><i class="fas fa-long-arrow-alt-left"></i>
                            <span class="d-inline-block back-to-cart">{{ __('Back to cart') }}</span></a>
                    </div>
                    <div class="col-md-6 checkout-button-group">
                        <span id="other_checkout"
                            style="display: {{ in_array(PaymentMethods::getSelectedMethod(), ['appley_pay', 'google_pay']) ? 'none' : 'block' }}">
                            @if (EcommerceHelper::isValidToProcessCheckout())
                                <button class="btn payment-checkout-btn payment-checkout-btn-step float-end"
                                    data-processing-text="{{ __('Processing. Please wait...') }}"
                                    data-error-header="{{ __('Error') }}"
                                    type="submit">
                                    {{ __('Checkout') }}
                                </button>
                            @else
                                <span class="btn payment-checkout-btn-step float-end disabled">
                                    {{ __('Checkout') }}
                                </span>
                            @endif
                            <span class="btn payment-checkout-btn-step float-end disabled">
                                {{ __('Checkout') }}
                            </span>
                        </span>
{{--
                        <span id="apple_pay_checkout"
                            style="display: {{ PaymentMethods::getSelectedMethod() == 'appley_pay' ? 'block' : 'none' }}">
                            @include('plugins/ecommerce::orders.checkout.apple_pay')
                        </span>
                        <span id="google_pay_checkout"
                            style="display: {{ PaymentMethods::getSelectedMethod() == 'google_pay' ? 'block' : 'none' }}">
                            @include('plugins/ecommerce::orders.checkout.google_pay')
                        </span> --}}
                    </div>
                </div>
                <div class="d-block d-md-none back-to-cart-button-group">
                    <a class="text-info"
                        href="{{ route('public.cart') }}">
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
	<!--<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBETz6vreNaK1VP8MFwCXiQ8snEJPUcwc&libraries=places&callback=initMap">
    </script>  -->
	 <script>
        var map;
        var marker;

        function initMap() {
            var DEFAULT_POSITION = {
                lat: $("#lat").val() != "" ? parseFloat($("#lat").val()) : 10.7629552,
                lng: $("#lng").val() != "" ? parseFloat($("#lng").val()) : 106.6539393
            };

            var geocoder = new google.maps.Geocoder();
            mapsProperties = {
                center: new google.maps.LatLng(DEFAULT_POSITION.lat, DEFAULT_POSITION.lng),
                zoom: 18,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                streetViewControl: false,
                // mapTypeControl: false,
                // disableDefaultUI: true,
                disableDoubleClickZoom: true,
            };

            map = new google.maps.Map(document.getElementById('map'), mapsProperties);
            var noPoi = [{
                    "featureType": "transit.station.bus",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    featureType: "poi.business",
                    elementType: "labels",
                    stylers: [{
                        visibility: "off"
                    }]
                }
            ];
            map.setOptions({
                styles: noPoi
            });

            let infoWindow = new google.maps.InfoWindow({
                content: "Click the map to get Lat/Lng!",
                position: DEFAULT_POSITION,
            });
            const center = {
                lat: 10.7629552,
                lng: 106.6539393
            };
            const input = document.getElementById("address_address");
            const defaultBounds = {
                north: center.lat + 0.1,
                south: center.lat - 0.1,
                east: center.lng + 0.1,
                west: center.lng - 0.1,
            };
            const options = {
                bounds: defaultBounds,
                componentRestrictions: {
                    country: "vn"
                },
                fields: ["address_components", "geometry", "icon", "name"],
                strictBounds: false,
                types: ["establishment"],
            };
            const autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo("bounds", map);
            const infowindow = new google.maps.InfoWindow();
            const infowindowContent = document.getElementById("infowindow-content");


            marker = new google.maps.Marker({
                position: DEFAULT_POSITION,
                draggable: true,
                map: map,
            });
            google.maps.event.addListener(marker, 'dragend', function(e) {
                getAddress('latLng', e.latLng, getDragendMarkerCallback);
                $("#lat").val(e.latLng.lat);
                $("#lng").val(e.latLng.lng);
                $("#latlng").val($("#lat").val() + "," + $("#lng").val());
            });


            autocomplete.addListener("place_changed", () => {
                try {


                    const place = autocomplete.getPlace();

                    if (!place.geometry || !place.geometry.location) {
                        // User entered the name of a Place that was not suggested and
                        // pressed the Enter key, or the Place Details request failed.
                        window.alert("No details available for input: '" + place.name + "'");
                        return;
                    }

                    // If the place has a geometry, then present it on a map.
                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);
                    }


                    $("#lat").val(place.geometry.location.lat);
                    $("#lng").val(place.geometry.location.lng);
                    $("#latlng").val($("#lat").val() + "," + $("#lng").val());

                    marker.setPosition(place.geometry.location);
                    marker.setVisible(true);
                    // infowindowContent.children["place-name"].textContent = place.name;
                    // infowindowContent.children["place-address"].textContent =place.formatted_address;
                    infowindow.setContent(place.formatted_address);
                    infowindow.close();
                    if (marker != undifine) {
                        marker.setVisible(false);
                    }

                    infowindow.open(map, marker);
                } catch (err) {
                    console.log(err);
                }

            });

            // infoWindow.open(map);
            map.addListener("click", (mapsMouseEvent) => {
                // Close the current InfoWindow.
                // infoWindow.close();

                // Create a new InfoWindow.
                // infoWindow = new google.maps.InfoWindow({
                //     position: mapsMouseEvent.latLng,
                // });
                // infoWindow.setContent(
                //     mapsMouseEvent.latLng.lat() + ","+ mapsMouseEvent.latLng.lng()

                // );
                // infoWindow.open(map);
                $("#latlng").val(mapsMouseEvent.latLng.lat() + "," + mapsMouseEvent.latLng.lng());
                $("#lat").val(mapsMouseEvent.latLng.lat());
                $("#lng").val(mapsMouseEvent.latLng.lng());

                if (marker == undefined) {
                    marker = new google.maps.Marker({
                        position: mapsMouseEvent.latLng,
                        // label: {
                        // color: 'white',
                        // fontWeight: 'bold',
                        // text: item.device.bien_so,
                        // className: 'marker_label-'+item.status,
                        // },
                        draggable: true,
                        map: map,
                    });
                    google.maps.event.addListener(marker, 'dragend', function(e) {
                        // console.log('marker dragend!');
                        // updateCurrentMarkerLocation(e.latLng);
                        // getAddress('latLng', e.latLng, getDragendMarkerCallback);

                        $("#lat").val(e.latLng.lat);
                        $("#lng").val(e.latLng.lng);
                        $("#latlng").val($("#lat").val() + "," + $("#lng").val());
                        // map.panTo(e.latLng);
                    });
                } else {
                    marker.setPosition(mapsMouseEvent.latLng);
                }



                // google.maps.event.addListener(marker, 'click', function (e) {
                //     tracking_device = this.device_id;
                //     kt_device_info(this.device_id);
                // });

            });

            function getAddress(type, value, callback) {
                var request = {};
                request[type] = value;
                if (geocoder) {
                    geocoder.geocode(request, function(result) {
                        if (result && $.isArray(result) && result.length) {
                            if (callback && $.isFunction(callback)) {
                                callback(result);
                            }
                        }
                    });
                }
            }

            function getDragendMarkerCallback(list) {
                if (list && $.isArray(list) && list.length) {
                    var obj = list[0];
                    var address = obj.formatted_address;
                    geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                        'address': address
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            lat = results[0].geometry.location.lat();
                            lng = results[0].geometry.location.lng();
                            ward = results[0].address_components[2].long_name;
                            //district = results[0].address_components[3].long_name;
                            if (results[0].address_components[2].types[0] == "administrative_area_level_2")
                                district = results[0].address_components[2].long_name;
                            else if (results[0].address_components[3].types[0] == "administrative_area_level_2")
                                district = results[0].address_components[3].long_name;
                            else if (results[0].address_components[4].types[0] == "administrative_area_level_2")
                                district = results[0].address_components[4].long_name;

                            var data = {
                                lat: obj.geometry.location.lat(),
                                lng: obj.geometry.location.lng(),
                                ward: ward,
                                district: district,
                                address: address
                            }

                            // $("#address").val(address);
                        } else {
                            alert('Geocode was not successful for the following reason: ' + status);
                        }
                    });
                    // updateCurrentMarker(obj.formatted_address, obj.place_id);
                    // markerInfoPromise = findMarkerInfo();
                    // findPolygon();
                }
            }

            function getDistase() {
                link =
                    `https://maps.googleapis.com/maps/api/distancematrix/json?destinations=New%20York%20City%2C%20NY&origins=Washington%2C%20DC&units=imperial&key=AIzaSyCBETz6vreNaK1VP8MFwCXiQ8snEJPUcwc`;
            }
            $(document).on("change","#direction",function(){
                changeMarkerIcon(marker, $(this).val())
            });
        }
    </script>
    <script type="text/javascript"
        src="{{ asset('vendor/core/core/js-validation/js/js-validation.js') }}"></script>
    {!! JsValidator::formRequest(\Botble\Ecommerce\Http\Requests\SaveCheckoutInformationRequest::class, '#checkout-form') !!}
    <script>
        $(document).ready(function () {
    // Ngày đặt hàng là ngày hôm nay
    var orderDate = new Date();

    // Kiểm tra giờ hiện tại
    var currentHour = orderDate.getHours();

    // Tính toán ngày tối thiểu dựa trên giờ hiện tại
    var minDate = new Date(orderDate);
    if (currentHour >= 14) {
        minDate.setDate(minDate.getDate() + 3); // Sau 14h, cộng thêm 3 ngày
    } else {
        minDate.setDate(minDate.getDate() + 2); // Trước 14h, cộng thêm 2 ngày
    }

    // Tính toán ngày tối đa là 3 tháng sau từ ngày đặt hàng
    var maxDate = new Date(orderDate);
    maxDate.setMonth(maxDate.getMonth() + 3);

    // Hàm để kiểm tra nếu một ngày là Chủ Nhật
    function isSunday(date) {
        return date.getDay() === 0;
    }

    // Tìm ngày hợp lệ đầu tiên
    var defaultDate = new Date(minDate);
    while (isSunday(defaultDate)) {
        defaultDate.setDate(defaultDate.getDate() + 1);
    }

    // Định dạng ngày thành chuỗi phù hợp với datetimepicker
    var formattedMinDate = minDate.getFullYear() + '-' +
        ('0' + (minDate.getMonth() + 1)).slice(-2) + '-' +
        ('0' + minDate.getDate()).slice(-2);

    var formattedMaxDate = maxDate.getFullYear() + '-' +
        ('0' + (maxDate.getMonth() + 1)).slice(-2) + '-' +
        ('0' + maxDate.getDate()).slice(-2);

    var formattedDefaultDate = defaultDate.getFullYear() + '-' +
        ('0' + (defaultDate.getMonth() + 1)).slice(-2) + '-' +
        ('0' + defaultDate.getDate()).slice(-2) + ' 08:00';

    $('#billing_address_delivered_time').datetimepicker({
        format: 'Y-m-d H:i', // Định dạng ngày giờ
        minDate: formattedMinDate, // Ngày tối thiểu dựa trên giờ hiện tại
        maxDate: formattedMaxDate, // Ngày tối đa là 3 tháng sau từ ngày đặt hàng
        minTime: '08:00', // Thời gian tối thiểu là 8:00
        maxTime: '19:30', // Thời gian tối đa là 19:30
        step: 30 // Bước nhảy của thời gian là 30 phút
        //  beforeShowDay: function(date) {
        // Vô hiệu hóa ngày Chủ Nhật
        //     var day = date.getDay();
        //     return [(day != 0)];
        // },
        // value: formattedDefaultDate // Đặt ngày mặc định
    });
});
</script>
@endpush
