{!! Form::open(['route' => 'public.send.coaching', 'method' => 'POST', 'class' => 'coaching-form']) !!}
    <div class="coaching-form-row">
        {!! apply_filters('pre_coaching_form', null) !!}

        <div class="coaching-column-6">
            <div class="coaching-form-group">
                <label for="coaching_name" class="coaching-label required">{{ __('Name') }}</label>
                <input type="text" class="coaching-form-input" name="name" value="{{ old('name') }}" id="coaching_name"
                       placeholder="{{ __('Name') }}">
            </div>
        </div>
        <div class="coaching-column-6">
            <div class="coaching-form-group">
                <label for="coaching_email" class="coaching-label required">{{ __('Email') }}</label>
                <input type="email" class="coaching-form-input" name="email" value="{{ old('email') }}" id="coaching_email"
                       placeholder="{{ __('Email') }}">
            </div>
        </div>
    </div>
    <div class="coaching-form-row">
        <div class="coaching-column-6">
            <div class="coaching-form-group">
                <label for="coaching_address" class="coaching-label">{{ __('Address') }}</label>
                <input type="text" class="coaching-form-input" name="address" value="{{ old('address') }}" id="coaching_address"
                       placeholder="{{ __('Address') }}">
            </div>
        </div>
        <div class="coaching-column-6">
            <div class="coaching-form-group">
                <label for="coaching_phone" class="coaching-label">{{ __('Phone') }}</label>
                <input type="text" class="coaching-form-input" name="phone" value="{{ old('phone') }}" id="coaching_phone"
                       placeholder="{{ __('Phone') }}">
            </div>
        </div>
    </div>
    <div class="coaching-form-row">
        <div class="coaching-column-12">
            <div class="coaching-form-group">
                <label for="coaching_subject" class="coaching-label">{{ __('Subject') }}</label>
                <input type="text" class="coaching-form-input" name="subject" value="{{ old('subject') }}" id="coaching_subject"
                       placeholder="{{ __('Subject') }}">
            </div>
        </div>
    </div>
    <div class="coaching-form-row">
        <div class="coaching-column-12">
            <div class="coaching-form-group">
                <label for="coaching_content" class="coaching-label required">{{ __('Message') }}</label>
                <textarea name="content" id="coaching_content" class="coaching-form-input" rows="5" placeholder="{{ __('Message') }}">{{ old('content') }}</textarea>
            </div>
        </div>
    </div>

    @if (is_plugin_active('captcha'))
        @if (Captcha::isEnabled())
            <div class="coaching-form-row">
                <div class="coaching-column-12">
                    <div class="coaching-form-group">
                        {!! Captcha::display() !!}
                    </div>
                </div>
            </div>
        @endif

        @if (setting('enable_math_captcha_for_coaching_form', 0))
            <div class="coaching-form-group">
                <label for="math-group" class="coaching-label required">{{ app('math-captcha')->label() }}</label>
                {!! app('math-captcha')->input(['class' => 'coaching-form-input', 'id' => 'math-group']) !!}
            </div>
        @endif
    @endif

    {!! apply_filters('after_coaching_form', null) !!}

    <div class="coaching-form-group"><p>{!! BaseHelper::clean(__('The field with (<span style="color:#FF0000;">*</span>) is required.')) !!}</p></div>

    <div class="coaching-form-group">
        <button type="submit" class="coaching-button">{{ __('Send') }}</button>
    </div>

    <div class="coaching-form-group">
        <div class="coaching-message coaching-success-message" style="display: none"></div>
        <div class="coaching-message coaching-error-message" style="display: none"></div>
    </div>

{!! Form::close() !!}
