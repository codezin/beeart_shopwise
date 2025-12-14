@if ($coaching)
    <div id="reply-wrapper">
        @if (count($coaching->replies) > 0)
            @foreach($coaching->replies as $reply)
                <p>{{ trans('plugins/coaching::coaching.tables.time') }}: <i>{{ $reply->created_at }}</i></p>
                <p>{{ trans('plugins/coaching::coaching.tables.content') }}:</p>
                <pre class="message-content">{!! BaseHelper::clean($reply->message) !!}</pre>
            @endforeach
        @else
            <p>{{ trans('plugins/coaching::coaching.no_reply') }}</p>
        @endif
    </div>

    <p><button class="btn btn-info answer-trigger-button">{{ trans('plugins/coaching::contcoachingact.reply') }}</button></p>

    <div class="answer-wrapper">
        <div class="form-group mb-3">
            {!! Form::editor('message', null, ['without-buttons' => true, 'class' => 'form-control']) !!}
        </div>

        <div class="form-group mb-3">
            <input type="hidden" value="{{ $coaching->id }}" id="input_coaching_id">
            <button class="btn btn-success answer-send-button"><i class="fas fa-reply"></i> {{ trans('plugins/coaching::coaching.send') }}</button>
        </div>
    </div>
@endif
