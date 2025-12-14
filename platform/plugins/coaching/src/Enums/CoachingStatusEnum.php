<?php

namespace Botble\Coaching\Enums;

use Botble\Base\Supports\Enum;
use Collective\Html\HtmlFacade as Html;
use Illuminate\Support\HtmlString;

/**
 * @method static CoachingStatusEnum UNREAD()
 * @method static CoachingStatusEnum READ()
 */
class CoachingStatusEnum extends Enum
{
    public const READ = 'read';
    public const UNREAD = 'unread';

    public static $langPath = 'plugins/coaching::coaching.statuses';

    public function toHtml(): HtmlString|string
    {
        return match ($this->value) {
            self::UNREAD => Html::tag('span', self::UNREAD()->label(), ['class' => 'label-warning status-label'])
                ->toHtml(),
            self::READ => Html::tag('span', self::READ()->label(), ['class' => 'label-success status-label'])
                ->toHtml(),
            default => parent::toHtml(),
        };
    }
}
