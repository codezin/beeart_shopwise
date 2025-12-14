<?php

namespace Botble\Coaching\Providers;

use Botble\Base\Facades\EmailHandler;
use Illuminate\Routing\Events\RouteMatched;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Coaching\Models\CoachingReply;
use Botble\Coaching\Repositories\Caches\CoachingReplyCacheDecorator;
use Botble\Coaching\Repositories\Eloquent\CoachingReplyRepository;
use Botble\Coaching\Repositories\Interfaces\CoachingInterface;
use Botble\Coaching\Models\Coaching;
use Botble\Coaching\Repositories\Caches\CoachingCacheDecorator;
use Botble\Coaching\Repositories\Eloquent\CoachingRepository;
use Botble\Coaching\Repositories\Interfaces\CoachingReplyInterface;
use Illuminate\Support\ServiceProvider;

class CoachingServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register(): void
    {
        $this->app->bind(CoachingInterface::class, function () {
            return new CoachingCacheDecorator(new CoachingRepository(new Coaching()));
        });

        $this->app->bind(CoachingReplyInterface::class, function () {
            return new CoachingReplyCacheDecorator(new CoachingReplyRepository(new CoachingReply()));
        });
    }

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/coaching')
            ->loadHelpers()
            ->loadAndPublishConfigurations(['permissions', 'email'])
            ->loadRoutes()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadMigrations()
            ->publishAssets();

        $this->app['events']->listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id' => 'cms-plugins-coaching',
                'priority' => 120,
                'parent_id' => null,
                'name' => 'plugins/coaching::coaching.menu',
                'icon' => 'far fa-envelope',
                'url' => route('coachings.index'),
                'permissions' => ['coachings.index'],
            ]);

            EmailHandler::addTemplateSettings(COACHING_MODULE_SCREEN_NAME, config('plugins.coaching.email', []));
        });

        $this->app->booted(function () {
            $this->app->register(HookServiceProvider::class);
        });
    }
}
