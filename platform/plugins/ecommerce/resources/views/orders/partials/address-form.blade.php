<div class="customer-address-payment-form">

    @if (EcommerceHelper::isEnabledGuestCheckout() && ! auth('customer')->check())
    <div class="form-group mb-3">
        <p>{{ __('Already have an account?') }} <a href="{{ route('customer.login') }}">{{ __('Login') }}</a></p>
    </div>
    @endif

    @if (auth('customer')->check())
    <div class="form-group mb-3">
        @if ($isAvailableAddress)
        <label class="control-label mb-2" for="address_id">{{ __('Select available addresses') }}:</label>
        @endif
        @php
        $oldSessionAddressId = old('address.address_id', $sessionAddressId);
        @endphp
        <div class="list-customer-address @if (! $isAvailableAddress) d-none @endif">
            <div class="select--arrow">
                <select name="address[address_id]" class="form-control" id="address_id">
                    <option value="new" @selected ($oldSessionAddressId=='new' )>{{ __('Add new address...') }}</option>
                    @if ($isAvailableAddress)
                    @foreach ($addresses as $address)
                    <option value="{{ $address->id }}" @selected ($oldSessionAddressId==$address->id)>{{ $address->full_address }}</option>
                    @endforeach
                    @endif
                </select>
                <i class="fas fa-angle-down"></i>
            </div>
            <br>
            <div class="address-item-selected @if (! $sessionAddressId) d-none @endif">
                @if ($isAvailableAddress && $oldSessionAddressId != 'new')
                @if ($oldSessionAddressId && $addresses->contains('id', $oldSessionAddressId))
                @include('plugins/ecommerce::orders.partials.address-item', ['address' => $addresses->firstWhere('id', $oldSessionAddressId)])
                @elseif ($defaultAddress = get_default_customer_address())
                @include('plugins/ecommerce::orders.partials.address-item', ['address' => $defaultAddress])
                @else
                @include('plugins/ecommerce::orders.partials.address-item', ['address' => Arr::first($addresses)])
                @endif
                @endif
            </div>
            <div class="list-available-address d-none">
                @if ($isAvailableAddress)
                @foreach($addresses as $address)
                <div class="address-item-wrapper" data-id="{{ $address->id }}">
                    @include('plugins/ecommerce::orders.partials.address-item', compact('address'))
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    @endif

    <div class="address-form-wrapper @if (auth('customer')->check() && $oldSessionAddressId !== 'new' && $isAvailableAddress) d-none @endif">
        <div class="form-group mb-3 @error('address.name') has-error @enderror">
            <div class="form-input-wrapper">
                <input type="text" name="address[name]" id="address_name" class="form-control" required value="{{ old('address.name', Arr::get($sessionCheckoutData, 'name')) ?: (auth('customer')->check() ? auth('customer')->user()->name : null) }}">
                <label for='address_name'>{{ __('Full Name') }}</label>
            </div>
            {!! Form::error('address.name', $errors) !!}
        </div>
        <div class="form-group mb-3 @error('address.address') has-error @enderror">
            <div class="form-input-wrapper">
                <input id="address_address" type="text" class="form-control" required name="address[address]" value="{{ old('address.address', Arr::get($sessionCheckoutData, 'address')) }}" autocomplete="false">
                <label for='address_address'>{{ __('Address') }}</label>
            </div>
            {!! Form::error('address.address', $errors) !!}
        </div>

        {{-- <div class="row">
            <div class="col-lg-6 col-12">
                <div class="form-group  @error('address.email') has-error @enderror">
                    <div class="form-input-wrapper">
                        <input type="email" name="address[email]" id="address_email" class="form-control" required value="{{ old('address.email', Arr::get($sessionCheckoutData, 'email')) ?: (auth('customer')->check() ? auth('customer')->user()->email : null) }}">
                        <label for='address_email'>{{ __('Email') }}</label>
                    </div>
                    {!! Form::error('address.email', $errors) !!}
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="form-group @error('address.phone') has-error @enderror">
                    <div class="form-input-wrapper">
                        <input type="tel" name="address[phone]" id="address_phone" class="form-control" @if (EcommerceHelper::isPhoneFieldOptionalAtCheckout()) required @endif value="{{ old('address.phone', Arr::get($sessionCheckoutData, 'phone')) ?: (auth('customer')->check() ? auth('customer')->user()->phone : null) }}">
                        <label for='address_phone'>{{ __('Phone') }}</label>
                    </div>
                    {!! Form::error('address.phone', $errors) !!}
                </div>
            </div>
        </div> --}}

        @if (EcommerceHelper::isUsingInMultipleCountries())
        <div class="form-group mb-3 @error('address.country') has-error @enderror">
            <div class="select--arrow form-input-wrapper">
                <select name="address[country]" class="form-control" required data-form-parent=".customer-address-payment-form" id="address_country" data-type="country">
                    @foreach(EcommerceHelper::getAvailableCountries() as $countryCode => $countryName)
                    <option value="{{ $countryCode }}" @if (old('address.country', Arr::get($sessionCheckoutData, 'country' ))==$countryCode) selected @endif>{{ $countryName }}</option>
                    @endforeach
                </select>
                <i class="fas fa-angle-down"></i>
                <label for='address_country'>{{ __('Country') }}</label>
            </div>
            {!! Form::error('address.country', $errors) !!}
        </div>
        @else
        <input type="hidden" name="address[country]" id="address_country" value="{{ EcommerceHelper::getFirstCountryId() }}">
        @endif

        <div class="row">
            <div class="col-sm-12 col-12" style="display:none">
                <div class="form-group mb-3 @error('address.state') has-error @enderror">
                    @if (EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation())
                    <div class="select--arrow form-input-wrapper">
                        <select name="address[state]" class="form-control" required data-form-parent=".customer-address-payment-form" id="address_state" data-type="state" data-url="{{ route('ajax.states-by-country') }}">
                            <option value="">{{ __('Select state...') }}</option>
                            @if (old('address.country', Arr::get($sessionCheckoutData, 'country')) || !EcommerceHelper::isUsingInMultipleCountries())
                            @foreach(EcommerceHelper::getAvailableStatesByCountry(old('address.country', Arr::get($sessionCheckoutData, 'country'))) as $stateId => $stateName)
                            <option value="{{ $stateId }}" @if (old('address.state', Arr::get($sessionCheckoutData, 'state' ))==$stateId) selected @endif>{{ $stateName }}</option>
                            @endforeach
                            @endif
                        </select>
                        <i class="fas fa-angle-down"></i>
                        <label for='address_state'>{{ __('State') }}</label>
                    </div>
                    @else
                    <div class="form-input-wrapper">
                        <input id="address_state" type="text" class="form-control" required name="address[state]" value="{{ old('address.state', Arr::get($sessionCheckoutData, 'state')) }}">
                        <label for='address_state'>{{ __('State') }}</label>
                    </div>
                    @endif
                    {!! Form::error('address.state', $errors) !!}
                </div>
            </div>

            <div class="col-sm-6 col-12">
                <div class="form-group  @error('address.city') has-error @enderror">
                    @if (EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation())
                    <div class="select--arrow form-input-wrapper">
                        <select name="address[city]" class="form-control" required id="address_city" data-type="city" data-url="{{ route('ajax.cities-by-state') }}">
                            <option value="">{{ __('Select city...') }}</option>
                            @foreach(EcommerceHelper::getAvailableCitiesByState(old('address.state', Arr::get($sessionCheckoutData, 'state'))) as $cityId => $cityName)
                            <option value="{{ $cityId }}" @if (old('address.city', Arr::get($sessionCheckoutData, 'city' ))==$cityId) selected @endif>{{ $cityName }}</option>
                            @endforeach

                        </select>
                        <i class="fas fa-angle-down"></i>
                        <label for='address_city'>{{ __('City') }}</label>
                    </div>
                    @else
                    <div class="form-input-wrapper">
                        <input id="address_city" type="text" class="form-control" required name="address[city]" value="{{ old('address.city', Arr::get($sessionCheckoutData, 'city')) }}">
                        <label for='address_city'>{{ __('City') }}</label>
                    </div>
                    @endif
                    {!! Form::error('address.city', $errors) !!}
                </div>
            </div>
            {{-- <div class="col-sm-6 col-12">
                <div class="form-group  @error('address.city') has-error @enderror">

                    <div class="form-input-wrapper">
                        <input id="address_city" type="text" class="form-control" required name="address[city_name]" value="{{ old('address.city_name', Arr::get($sessionCheckoutData, 'city')) }}">
                        <label for='address_city'>{{ __('City') }}</label>
                    </div>

                    {!! Form::error('address.city', $errors) !!}
                </div>
            </div> --}}

            {{-- <div class="col-sm-6 col-12">
                <div class="form-group mb-3 @error('address.state') has-error @enderror">
                    <div class="form-input-wrapper">
                        <input id="address_state" type="text" class="form-control" required name="address[state_name]" value="{{ old('address.state_name', Arr::get($sessionCheckoutData, 'state_name')) }}">
                        <label for='address_state'>{{ __('Postcode') }}</label>
                    </div>
                    {!! Form::error('address.state', $errors) !!}
                </div>
            </div> --}}
            <div class="col-sm-6 col-12">
                <div class="form-group mb-3 @error('address.postcode') has-error @enderror">
                    <div class="form-input-wrapper">
                        <input id="address_postcode" type="text" class="form-control" required name="address[postcode]" value="{{old('address.postcode', Arr::get($sessionCheckoutData, 'address_postcode')) }}" autocomplete="false">
                        <label for='address_postcode'>{{ __('Postcode') }}</label>
                    </div>
                    {!! Form::error('address.postcode', $errors) !!}
                </div>
            </div>
        </div>

    </div>


    @if (EcommerceHelper::isZipCodeEnabled())
    <div class="form-group mb-3 @error('address.zip_code') has-error @enderror">
        <div class="form-input-wrapper">
            <input id="address_zip_code" type="text" class="form-control" name="address[zip_code]" required value="{{ old('address.zip_code', Arr::get($sessionCheckoutData, 'zip_code')) }}">
            <label for='address_zip_code'>{{ __('Zip code') }}</label>
        </div>
        {!! Form::error('address.zip_code', $errors) !!}
    </div>
    @endif
    <div class="form-group mb-3">
        <label><b>{{ __(' When you want your order delivered') }}</b></label>
        <div class="form-input-wrapper">
            <input id="billing_address_delivered_time" type="text" class="form-control" readonly name="delivered_time" value="{{ old('delivered_time', Arr::get($sessionCheckoutData, 'delivered_time')) }}" autocomplete="offf">
        </div>
        {!! Form::error('billing_address.delivered_time', $errors) !!}
    </div>


</div>

@if (! auth('customer')->check())
<div class="form-group mb-3">
    <input type="checkbox" name="create_account" value="1" id="create_account" @if (old('create_account')==1) checked @endif>
    <label for="create_account" class="control-label ps-2">{{ __('Register an account with above information?') }}</label>
</div>

<div class="password-group @if (! $errors->has('password') && ! $errors->has('password_confirmation')) d-none @endif">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group  @error('password') has-error @enderror">
                <div class="form-input-wrapper">
                    <input id="password" type="password" class="form-control" name="password" autocomplete="password">
                    <label for='password'>{{ __('Password') }}</label>
                </div>
                {!! Form::error('password', $errors) !!}
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="form-group @error('password_confirmation') has-error @enderror">
                <div class="form-input-wrapper">
                    <input id="password-confirm" type="password" class="form-control" autocomplete="password-confirmation" name="password_confirmation">
                    <label for='password-confirm'>{{ __('Password confirmation') }}</label>
                </div>
                {!! Form::error('password_confirmation', $errors) !!}
            </div>
        </div>
    </div>
</div>
@endif
</div>
