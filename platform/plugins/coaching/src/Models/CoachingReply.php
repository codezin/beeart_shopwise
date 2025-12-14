<?php

namespace Botble\Coaching\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Models\BaseModel;

class CoachingReply extends BaseModel
{
    protected $table = 'coaching_replies';

    protected $fillable = [
        'message',
        'coaching_id',
    ];

    protected $casts = [
        'message' => SafeContent::class,
    ];
}
