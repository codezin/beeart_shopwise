<?php

namespace Botble\Coaching;

use Botble\PluginManagement\Abstracts\PluginOperationAbstract;
use Botble\Setting\Models\Setting;
use Illuminate\Support\Facades\Schema;

class Plugin extends PluginOperationAbstract
{
    public static function remove(): void
    {
        Schema::dropIfExists('coaching_replies');
        Schema::dropIfExists('coaching');

        Setting::query()
            ->whereIn('key', [
                'blacklist_keywords',
                'blacklist_email_domains',
                'enable_math_captcha_for_ccoaching_form',
            ])
            ->delete();
    }
}
