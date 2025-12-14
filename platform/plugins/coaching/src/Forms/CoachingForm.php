<?php

namespace Botble\Coaching\Forms;

use Botble\Base\Facades\Assets;
use Botble\Base\Forms\FormAbstract;
use Botble\Coaching\Enums\CoachingStatusEnum;
use Botble\Coaching\Http\Requests\EditCoachingRequest;
use Botble\Coaching\Models\Coaching;

class CoachingForm extends FormAbstract
{
    public function buildForm(): void
    {
        Assets::addScriptsDirectly('vendor/core/plugins/coaching/js/coaching.js')
            ->addStylesDirectly('vendor/core/plugins/coaching/css/coaching.css');

        $this
            ->setupModel(new Coaching())
            ->setValidatorClass(EditCoachingRequest::class)
            ->withCustomFields()
            ->add('status', 'customSelect', [
                'label' => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'choices' => CoachingStatusEnum::labels(),
            ])
            ->setBreakFieldPoint('status')
            ->addMetaBoxes([
                'information' => [
                    'title' => trans('plugins/coaching::coaching.coaching_information'),
                    'content' => view('plugins/coaching::coaching-info', ['coaching' => $this->getModel()])->render(),
                    'attributes' => [
                        'style' => 'margin-top: 0',
                    ],
                ],
                'replies' => [
                    'title' => trans('plugins/coaching::coaching.replies'),
                    'content' => view('plugins/coaching::reply-box', ['coaching' => $this->getModel()])->render(),
                ],
            ]);
    }
}
