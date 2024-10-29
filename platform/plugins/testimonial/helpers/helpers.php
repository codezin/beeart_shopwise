<?php

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Botble\Base\Supports\SortItemsWithChildrenHelper;
use Botble\Blog\Repositories\Interfaces\CategoryInterface;
use Botble\Testimonial\Repositories\Interfaces\TestimonialInterface;
use Botble\Blog\Repositories\Interfaces\TagInterface;
use Botble\Blog\Supports\PostFormat;
use Botble\Page\Repositories\Interfaces\PageInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

if (! function_exists('get_testimonials')) {
    function get_testimonials(): Collection
    {
        return app(TestimonialInterface::class)->all();
    }
}
