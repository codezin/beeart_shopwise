<?php

namespace Botble\Coaching\Http\Requests;

use Botble\Base\Facades\BaseHelper;
use Botble\Captcha\Facades\Captcha;
use Botble\Support\Http\Requests\Request;

class CoachingRequest extends Request
{
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email',
            'content' => 'required|string',
            'phone' => 'nullable|' . BaseHelper::getPhoneValidationRule(),
        ];

        if (is_plugin_active('captcha')) {
            $rules += Captcha::rules();

            if (setting('enable_math_captcha_for_coaching_form', 0)) {
                $rules += Captcha::mathCaptchaRules();
            }
        }

        return $rules;
    }

    public function attributes(): array
    {
        return [
            'name' => __('Name'),
            'email' => __('Email'),
            'phone' => __('Phone'),
            'content' => __('Content'),
        ] + (is_plugin_active('captcha') ? Captcha::attributes() : []);
    }
}
