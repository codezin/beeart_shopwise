<?php

namespace Botble\CustomField\Models;

use Exception;
use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class CustomField extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'custom_fields';

    /**
     * @var array
     */
    protected $fillable = [
        'use_for',
        'use_for_id',
        'parent_id',
        'type',
        'slug',
        'value',
        'field_item_id',
        'lang_code'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return MorphTo
     */
    public function useCustomFields(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get $this->resolved_value
     * @return array|mixed
     */
    public function getResolvedValueAttribute()
    {
        $value = $this->value;
        switch ($this->type) {
            case 'repeater':
                try {
                    $value = json_decode($this->value, true);
                } catch (Exception $exception) {
                    $value = [];
                }
                break;
        }

        return $value;
    }
}
