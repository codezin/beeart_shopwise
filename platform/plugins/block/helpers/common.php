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
