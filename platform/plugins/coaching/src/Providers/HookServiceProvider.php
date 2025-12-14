<?php

namespace Botble\Coaching\Providers;

use Botble\Base\Facades\Assets;
use Botble\Coaching\Enums\CoachingStatusEnum;
use Botble\Coaching\Repositories\Interfaces\CoachingInterface;
use Botble\Shortcode\Compilers\Shortcode;
use Collective\Html\HtmlFacade as Html;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Botble\Theme\Facades\Theme;

class HookServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        add_filter(BASE_FILTER_TOP_HEADER_LAYOUT, [$this, 'registerTopHeaderNotification'], 120);
        add_filter(BASE_FILTER_APPEND_MENU_NAME, [$this, 'getUnreadCount'], 120, 2);
        add_filter(BASE_FILTER_MENU_ITEMS_COUNT, [$this, 'getMenuItemCount'], 120);

        if (function_exists('add_shortcode')) {
            add_shortcode(
                'coaching-form',
                trans('plugins/coaching::coaching.shortcode_name'),
                trans('plugins/coaching::coaching.shortcode_description'),
                [$this, 'form']
            );

            shortcode()
                ->setAdminConfig('coaching-form', view('plugins/coaching::partials.short-code-admin-config')->render());
        }

        add_filter(BASE_FILTER_AFTER_SETTING_CONTENT, [$this, 'addSettings'], 93);
    }

    public function registerTopHeaderNotification(?string $options): ?string
    {
        if (Auth::user()->hasPermission('coachings.edit')) {
            $coachings = $this->app[CoachingInterface::class]
                ->advancedGet([
                    'condition' => [
                        'status' => CoachingStatusEnum::UNREAD,
                    ],
                    'paginate' => [
                        'per_page' => 10,
                        'current_paged' => 1,
                    ],
                    'select' => ['id', 'name', 'email', 'phone', 'created_at'],
                    'order_by' => ['created_at' => 'DESC'],
                ]);

            if ($coachings->count() == 0) {
                return $options;
            }

            return $options . view('plugins/coaching::partials.notification', compact('coachings'))->render();
        }

        return $options;
    }

    public function getUnreadCount(string|null|int $number, string $menuId): int|string|null
    {
        if ($menuId !== 'cms-plugins-coaching') {
            return $number;
        }

        $attributes = [
            'class' => 'badge badge-success menu-item-count unread-coachings',
            'style' => 'display: none;',
        ];

        return Html::tag('span', '', $attributes)->toHtml();
    }

    public function getMenuItemCount(array $data = []): array
    {
        if (Auth::user()->hasPermission('coachings.index')) {
            $data[] = [
                'key' => 'unread-coaching',
                'value' => app(CoachingInterface::class)->countUnread(),
            ];
        }

        return $data;
    }

    public function form(Shortcode $shortcode): string
    {
        $view = apply_filters(COACHING_FORM_TEMPLATE_VIEW, 'plugins/coaching::forms.coaching');

        if (defined('THEME_OPTIONS_MODULE_SCREEN_NAME')) {
            $this->app->booted(function () {
                Theme::asset()
                    ->usePath(false)
                    ->add('coaching-css', asset('vendor/core/plugins/coaching/css/coaching-public.css'), [], [], '1.0.0');

                Theme::asset()
                    ->container('footer')
                    ->usePath(false)
                    ->add(
                        'coaching-public-js',
                        asset('vendor/core/plugins/coaching/js/coaching-public.js'),
                        ['jquery'],
                        [],
                        '1.0.0'
                    );
            });
        }

        if ($shortcode->view && view()->exists($shortcode->view)) {
            $view = $shortcode->view;
        }

        return view($view, compact('shortcode'))->render();
    }

    public function addSettings(?string $data = null): string
    {
        Assets::addStylesDirectly('vendor/core/core/base/libraries/tagify/tagify.css')
            ->addScriptsDirectly([
                'vendor/core/core/base/libraries/tagify/tagify.js',
                'vendor/core/core/base/js/tags.js',
            ]);

        return $data . view('plugins/coaching::settings')->render();
    }
}
