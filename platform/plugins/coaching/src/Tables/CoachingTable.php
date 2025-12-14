<?php

namespace Botble\Coaching\Tables;

use Botble\Base\Facades\BaseHelper;
use Botble\Coaching\Exports\CoachingExport;
use Botble\Coaching\Models\Coaching;
use Collective\Html\HtmlFacade as Html;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Botble\Coaching\Enums\CoachingStatusEnum;
use Botble\Coaching\Repositories\Interfaces\CoachingInterface;
use Botble\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class CoachingTable extends TableAbstract
{
    protected $hasActions = true;

    protected $hasFilter = true;

    protected string $exportClass = CoachingExport::class;

    public function __construct(DataTables $table, UrlGenerator $urlGenerator, CoachingInterface $coachingRepository)
    {
        parent::__construct($table, $urlGenerator);

        $this->repository = $coachingRepository;

        if (! Auth::user()->hasAnyPermission(['coaching.edit', 'coaching.destroy'])) {
            $this->hasOperations = false;
            $this->hasActions = false;
        }
    }

    public function ajax(): JsonResponse
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('name', function (Coaching $item) {
                if (! Auth::user()->hasPermission('coaching.edit')) {
                    return BaseHelper::clean($item->name);
                }

                return Html::link(route('coaching.edit', $item->id), BaseHelper::clean($item->name));
            })
            ->editColumn('checkbox', function (Coaching $item) {
                return $this->getCheckbox($item->id);
            })
            ->editColumn('created_at', function (Coaching $item) {
                return BaseHelper::formatDate($item->created_at);
            })
            ->editColumn('status', function (Coaching $item) {
                return $item->status->toHtml();
            })
            ->addColumn('operations', function (Coaching $item) {
                return $this->getOperations('coaching.edit', 'coaching.destroy', $item);
            });

        return $this->toJson($data);
    }

    public function query(): Relation|Builder|QueryBuilder
    {
        $query = $this->repository->getModel()->select([
            'id',
            'name',
            'phone',
            'email',
            'created_at',
            'status',
        ]);

        return $this->applyScopes($query);
    }

    public function columns(): array
    {
        return [
            'id' => [
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'name' => [
                'title' => trans('core/base::tables.name'),
                'class' => 'text-start',
            ],
            'email' => [
                'title' => trans('plugins/coaching::coaching.tables.email'),
                'class' => 'text-start',
            ],
            'phone' => [
                'title' => trans('plugins/coaching::coaching.tables.phone'),
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
            'status' => [
                'title' => trans('core/base::tables.status'),
                'width' => '100px',
            ],
        ];
    }

    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('coachings.deletes'), 'coaching.destroy', parent::bulkActions());
    }

    public function getBulkChanges(): array
    {
        return [
            'name' => [
                'title' => trans('core/base::tables.name'),
                'type' => 'text',
                'validate' => 'required|max:120',
            ],
            'email' => [
                'title' => trans('core/base::tables.email'),
                'type' => 'text',
                'validate' => 'required|max:120',
            ],
            'phone' => [
                'title' => trans('plugins/coaching::coaching.sender_phone'),
                'type' => 'text',
                'validate' => 'required|max:120',
            ],
            'status' => [
                'title' => trans('core/base::tables.status'),
                'type' => 'customSelect',
                'choices' => CoachingStatusEnum::labels(),
                'validate' => 'required|' . Rule::in(CoachingStatusEnum::values()),
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type' => 'datePicker',
            ],
        ];
    }

    public function getDefaultButtons(): array
    {
        return [
            'export',
            'reload',
        ];
    }
}
