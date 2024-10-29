<?php

namespace Botble\Block\Forms;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\Block\Http\Requests\BlockRequest;
use Botble\Block\Models\Block;

class BlockForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $this
            ->setupModel(new Block)
            ->setValidatorClass(BlockRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label'      => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('alias', 'text', [
                'label'      => trans('core/base::forms.alias'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.alias_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('page', 'text', [
                'label'      => trans('core/base::forms.page'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                ],
            ])
            ->add('link', 'text', [
                'label'      => trans('core/base::forms.link'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'placeholder'  => 'Link',
                ],
            ])
            ->add('description', 'textarea', [
                'label'      => trans('core/base::forms.description'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'rows'         => 4,
                    'placeholder'  => trans('core/base::forms.description_placeholder'),
                    'data-counter' => 400,
                ],
            ])
            ->add('content', 'editor', [
                'label'      => trans('core/base::forms.content'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'rows'        => 4,
                    'placeholder' => trans('core/base::forms.description_placeholder'),
                ],
            ])
            ->add('rowOpen1', 'html', [
                'html' => '<div class="row">',
            ])
            ->add('image', 'mediaImage', [
                'label' => trans('core/base::forms.image'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group col-md-3',
                ],
            ])
            ->add('banner', 'mediaImage', [
                'label' => trans('core/base::forms.banner'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group col-md-3',
                ],
            ])
            ->add('file', 'mediaFile', [
                'label' => "File",
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group col-md-3',
                ],
            ])
            ->add('rowClose1', 'html', [
                'html' => '</div>',
            ])
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->setBreakFieldPoint('status');

    }
}
