<?php

use Botble\Block\Repositories\Interfaces\BlockInterface;
use \Botble\Language\LanguageManager;
use Botble\Language\Models\LanguageMeta;
use Botble\Language\Facades\Language;
if (!function_exists('get_list_blocks')) {
    /**
     * @param array $condition
     * @return array
     */
    function get_list_blocks(array $condition)
    {
        return app(BlockInterface::class)->allBy($condition);
    }
}
if (!function_exists('get_blocks')) {
    /**
     * @param array $condition
     * @return array
     */
    function get_blocks(array $condition, $lang = "vn")
    {
        $query  = new \Botble\Block\Models\Block();
        $query = $query->where($condition)->where("reference_type","Botble\Block\Models\Block");
        $query->join("language_meta", 'language_meta.reference_id', '=', 'blocks.id');
        $slug = $query->first();
        // $lang =  LanguageManager::getCurrentLocale();
        $reference_id = @LanguageMeta::where("lang_meta_code","like", $lang."%")->where("lang_meta_origin", $slug->lang_meta_origin)->first()->reference_id;

        if(@$reference_id=="")
        {
            return null;
        }
        return  \Botble\Block\Models\Block::where("id", $reference_id)->first();
    }
}
if (!function_exists('get_blocks_by_slug')) {
    /**
     * @param array $condition
     * @return array
     */
    function get_blocks_by_slug($alias)
    {
        $query  = new \Botble\Block\Models\Block();
        $query = $query->where('alias', $alias)->where("reference_type","Botble\Block\Models\Block");
        $query->join("language_meta", 'language_meta.reference_id', '=', 'blocks.id');
        $slug = $query->first();
        $lang =  Language::getCurrentLocaleCode();
        $reference_id = @LanguageMeta::where("lang_meta_code","like", ($lang??"en_US")."%")->where("lang_meta_origin", $slug->lang_meta_origin)->first()->reference_id;
        if(@$reference_id == "")
        {
            return null;
        }
        return  \Botble\Block\Models\Block::where("id", $reference_id)->first();
    }
}
if (!function_exists('get_blocks_by_id')) {
    /**
     * @param array $condition
     * @return array
     */
    function get_blocks_by_id($id)
    {
        $query  = new \Botble\Block\Models\Block();
        $query = $query->where('id', $id)->where("reference_type","Botble\Block\Models\Block");
        $query->join("language_meta", 'language_meta.reference_id', '=', 'blocks.id');
        $slug = $query->first();
        $lang =  Language::getCurrentLocaleCode();
        $reference_id = @LanguageMeta::where("lang_meta_code","like", ($lang??"en_US")."%")->where("lang_meta_origin", $slug->lang_meta_origin)->first()->reference_id;
        if(@$reference_id == "")
        {
            return null;
        }
        return  \Botble\Block\Models\Block::where("id", $reference_id)->first();
    }
}

$links_icon = [];
if (! function_exists('get_links_icon')) {
    function get_links_icon($key = null)
    {
        global $links_icon;
        $result = [];
        // Fetch and process data if $links_icon is empty or needs to be refreshed
        if (empty($links_icon) || true) {
            $data = json_decode(theme_option('links_icon'), true); // Decode JSON to array

            foreach ($data as $subArray) {
                // Remove "social-" prefix from all keys in the sub-array
                $newArray = json_decode(str_replace("social-", "", json_encode($subArray)), true) ?? [];

                // Merge the processed array and original sub-array, mapping "value" by "key"
                $obj = (object)\Arr::pluck(array_merge($newArray, $subArray), "value", "key");
                $result[$obj->slug??$obj->name] = $obj;
            }

            // Cache the processed result globally
            $links_icon = $result;
        }

        // Return either the full cached array or a specific key’s value
        return $key === null ? $links_icon : ($links_icon[$key] ?? null);
    }
}


$social_icon = [];
if (! function_exists('get_social_icon')) {
    function get_social_icon($key = null)
    {
        global $links_icon;
        $result = [];
        // Fetch and process data if $links_icon is empty or needs to be refreshed
        if (empty($links_icon) || true) {
            $data = json_decode(theme_option('social_links'), true); // Decode JSON to array

            foreach ($data as $subArray) {
                // Remove "social-" prefix from all keys in the sub-array
                $newArray = json_decode(str_replace("social-", "", json_encode($subArray)), true) ?? [];

                // Merge the processed array and original sub-array, mapping "value" by "key"
                $obj = (object)\Arr::pluck(array_merge($newArray, $subArray), "value", "key");
                $result[$obj->slug??$obj->name] = $obj;
            }

            // Cache the processed result globally
            $social_icon = $result;
        }

        // Return either the full cached array or a specific key’s value
        return $key === null ? $social_icon : ($social_icon[$key] ?? null);
    }
}
