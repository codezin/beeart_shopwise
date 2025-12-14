<?php

namespace Botble\Coaching\Repositories\Caches;

use Botble\Support\Repositories\Caches\CacheAbstractDecorator;
use Botble\Coaching\Repositories\Interfaces\CoachingInterface;
use Illuminate\Database\Eloquent\Collection;

class CoachingCacheDecorator extends CacheAbstractDecorator implements CoachingInterface
{
    public function getUnread(array $select = ['*']): Collection
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    public function countUnread(): int
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
