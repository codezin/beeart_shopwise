<?php

use Botble\SimpleSlider\Repositories\Interfaces\SimpleSliderInterface;
use Illuminate\Database\Eloquent\Collection;

if (! function_exists('get_all_simple_sliders')) {
    /**
     * @deprecated
     */
    function get_all_simple_sliders(array $condition = []): Collection
    {
        return app(SimpleSliderInterface::class)->allBy($condition);
    }
}
if (! function_exists('get_slider')) {
    function get_slider($slug)
    {
        return app(SimpleSliderInterface::class)->getFirstBy([
            'key' =>  $slug,
            'status' => 'published',
        ])->sliderItems;
    }
}
