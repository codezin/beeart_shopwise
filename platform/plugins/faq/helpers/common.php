<?php

use Botble\Faq\Repositories\Interfaces\FaqInterface;
use Botble\Faq\Repositories\Interfaces\FaqCategoryInterface;
use \Botble\Language\LanguageManager;
use Botble\Language\Models\LanguageMeta;
if (!function_exists('get_list_faqs')) {
    /**
     * @param array $condition
     * @return array
     */
    function get_list_faqs(array $condition)
    {
        return app(FaqInterface::class)->allBy($condition);
    }

     function get_list_faqs_categories(array $condition)
    {
        return app(FaqCategoryInterface::class)->allBy($condition);
    }
}
