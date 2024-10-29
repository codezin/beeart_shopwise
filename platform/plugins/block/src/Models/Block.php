<?php

namespace Botble\Block\Models;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Traits\EnumCastable;
use Botble\Base\Models\BaseModel;

use Botble\Language\Models\LanguageMeta;
class Block extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blocks';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'content',
        'status',
        'page',
        'link',
        'image',
        'banner',
        'file',
        'lang_meta_code',
        'lang_meta_origin'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public function LanguageMeta()
    {
        return $this->hasOne(LanguageMeta::class,"id","reference_id");
    }
}
