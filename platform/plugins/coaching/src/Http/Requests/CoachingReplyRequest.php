<?php

namespace Botble\Coaching\Http\Requests;

use Botble\Support\Http\Requests\Request;

class CoachingReplyRequest extends Request
{
    public function rules(): array
    {
        return [
            'message' => 'required|string',
        ];
    }
}
