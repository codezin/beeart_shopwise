<?php

use Botble\Page\Repositories\Interfaces\PageInterface;
use Botble\Page\Supports\Template;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Support\Facades\DB;
if (! function_exists('get_all_pages')) {
    function get_all_pages(bool $active = true): Collection
    {
        return app(PageInterface::class)->getAllPages($active);
    }
}

if (! function_exists('register_page_template')) {
    function register_page_template(array $templates): void
    {
        Template::registerPageTemplate($templates);
    }
}

if (! function_exists('get_page_templates')) {
    function get_page_templates(): array
    {
        return Template::getPageTemplates();
    }
}


if (!function_exists('get_page_by_id')) {
    /**
     * @param array $condition
     * @return array
     */
    function get_page_by_id($slug , $lang = "en_US")
    {
        if($lang == "en_US")
        {
            $query  = new Botble\Page\Models\Page();
            $query = $query->where('id', $slug);
        }
        else{
            $query  = DB::table("pages_translations");
            $query = $query->where('pages_id', $slug);
        }

        // $query = $query->where('id', $slug)->where("lang_code","like", ($lang??"en_US")."%");
        // $query->join("pages_translations", 'pages_translations.pages_id', '=', 'pages.id');
        $page = $query->first();
        
        return $page;
    }
}