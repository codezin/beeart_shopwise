<?php

namespace Botble\Coaching\Http\Requests;

use Botble\Coaching\Enums\CoachingStatusEnum;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class EditCoachingRequest extends Request
{
    public function rules(): array
    {
        return [
            'status' => Rule::in(CoachingStatusEnum::values()),
        ];
    }
}
