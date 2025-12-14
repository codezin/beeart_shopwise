<?php

namespace Botble\Coaching\Http\Controllers;

use Botble\Base\Facades\PageTitle;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Base\Traits\HasDeleteManyItemsTrait;
use Botble\Coaching\Enums\CoachingStatusEnum;
use Botble\Coaching\Forms\CoachingForm;
use Botble\Coaching\Http\Requests\CoachingReplyRequest;
use Botble\Coaching\Http\Requests\EditCoachingRequest;
use Botble\Coaching\Models\Coaching;
use Botble\Coaching\Repositories\Interfaces\CoachingReplyInterface;
use Botble\Coaching\Tables\CoachingTable;
use Botble\Coaching\Repositories\Interfaces\CoachingInterface;
use Botble\Base\Facades\EmailHandler;
use Exception;
use Illuminate\Http\Request;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;

class CoachingController extends BaseController
{
    use HasDeleteManyItemsTrait;

    public function __construct(protected CoachingInterface $coachingRepository)
    {
    }

    public function index(CoachingTable $dataTable)
    {
        PageTitle::setTitle(trans('plugins/coaching::coaching.menu'));

        return $dataTable->renderTable();
    }

    public function edit(Coaching $coaching, FormBuilder $formBuilder)
    {
        PageTitle::setTitle(trans('plugins/coaching::coaching.edit'));

        return $formBuilder->create(CoachingForm::class, ['model' => $coaching])->renderForm();
    }

    public function update(cCoaching $coaching, EditCoachingRequest $request, BaseHttpResponse $response)
    {
        $coaching->fill($request->input());

        $this->coachingRepository->createOrUpdate($coaching);

        event(new UpdatedContentEvent(COACHING_MODULE_SCREEN_NAME, $request, $coaching));

        return $response
            ->setPreviousUrl(route('coachings.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(Coaching $coaching, Request $request, BaseHttpResponse $response)
    {
        try {
            $this->coachingRepository->delete($coaching);
            event(new DeletedContentEvent(COACHING_MODULE_SCREEN_NAME, $request, $coaching));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }

    public function deletes(Request $request, BaseHttpResponse $response)
    {
        return $this->executeDeleteItems($request, $response, $this->coachingRepository, COACHING_MODULE_SCREEN_NAME);
    }

    public function postReply(
        int|string $id,
        CoachingReplyRequest $request,
        BaseHttpResponse $response,
        CoachingReplyInterface $coachingReplyRepository
    ) {
        $coaching = $this->coachingRepository->findOrFail($id);

        EmailHandler::send($request->input('message'), 'Re: ' . $coaching->subject, $coaching->email);

        $coachingReplyRepository->create([
            'message' => $request->input('message'),
            'coaching_id' => $coaching->id,
        ]);

        $coaching->status = CoachingStatusEnum::READ();
        $this->coachingRepository->createOrUpdate($coaching);

        return $response
            ->setMessage(trans('plugins/coaching::coaching.message_sent_success'));
    }
}
