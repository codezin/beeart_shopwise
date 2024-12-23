<?php

use Botble\CustomField\Repositories\Interfaces\CustomFieldInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Botble\Language\Facades\Language;
if (!function_exists('get_field')) {
    /**
     * @param Eloquent|Model $data
     * @param null $key
     * @param null $default
     * @return string|null
     */
    function get_field($data, $key = null, $default = null)
    {
        if (empty($data)) {
            return $default;
        }

        $customFieldRepository = app(CustomFieldInterface::class);

        if ($key === null || !trim($key)) {
            return $customFieldRepository->getFirstBy([
                'use_for'    => get_class($data),
                'use_for_id' => $data->id,
                'lang_code' => Language::getCurrentLocaleCode()
            ]);
        }

        $field = $customFieldRepository->getFirstBy([
            'use_for'    => get_class($data),
            'use_for_id' => $data->id,
            'slug'       => $key,
            'lang_code' => Language::getCurrentLocaleCode()
        ]);

        if (!$field || !$field->resolved_value) {
            return $default;
        }

        return $field->resolved_value;
    }
}

if (!function_exists('has_field')) {
    /**
     * @param Eloquent|Model $data
     * @param null $key
     * @return bool
     */
    function has_field($data, $key = null)
    {
        if (!get_field($data, $key)) {
            return false;
        }
        return true;
    }
}

if (!function_exists('get_sub_field')) {
    /**
     * @param array $parentField
     * @param string $key
     * @param null $default
     * @return mixed
     */
    function get_sub_field(array $parentField, $key, $default = null)
    {
        foreach ($parentField as $field) {
            if (Arr::get($field, 'slug') === $key) {
                return Arr::get($field, 'value', $default);
            }
        }
        return $default;
    }
}

if (!function_exists('has_sub_field')) {
    /**
     * @param array $parentField
     * @param string $key
     * @return bool
     */
    function has_sub_field(array $parentField, $key)
    {
        if (!get_sub_field($parentField, $key)) {
            return false;
        }
        return true;
    }
}
