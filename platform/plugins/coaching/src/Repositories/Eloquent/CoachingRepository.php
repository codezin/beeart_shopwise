<?php

namespace Botble\Coaching\Repositories\Eloquent;

use Botble\Coaching\Enums\CoachingStatusEnum;
use Botble\Coaching\Repositories\Interfaces\CoachingInterface;
use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;
use Illuminate\Database\Eloquent\Collection;

class CoachingRepository extends RepositoriesAbstract implements CoachingInterface
{
    public function getUnread(array $select = ['*']): Collection
    {
        $data = $this->model
            ->where('status', CoachingStatusEnum::UNREAD)
            ->select($select)
            ->orderBy('created_at', 'DESC')
            ->get();

        $this->resetModel();

        return $data;
    }

    public function countUnread(): int
    {
        $data = $this->model->where('status', CoachingStatusEnum::UNREAD)->count();
        $this->resetModel();

        return $data;
    }
}
