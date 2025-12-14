@if ($coaching)
    <p>{{ trans('plugins/coaching::coaching.tables.time') }}: <i>{{ $coaching->created_at }}</i></p>
    <p>{{ trans('plugins/coaching::coaching.tables.full_name') }}: <i>{{ $coaching->name }}</i></p>
    <p>{{ trans('plugins/coaching::coaching.tables.email') }}: <i><a href="mailto:{{ $coaching->email }}">{{ $coaching->email }}</a></i></p>
    <p>{{ trans('plugins/coaching::coaching.tables.phone') }}: <i>@if ($coaching->phone) <a href="tel:{{ $coaching->phone }}">{{ $coaching->phone }}</a> @else N/A @endif</i></p>
    <p>{{ trans('plugins/concoachingtact::coaching.tables.address') }}: <i>{{ $coaching->address ?: 'N/A' }}</i></p>
    <p>{{ trans('plugins/coaching::coaching.tables.subject') }}: <i>{{ $coaching->subject ?: 'N/A' }}</i></p>
    <p>{{ trans('plugins/coaching::coaching.tables.content') }}:</p>
    <pre class="message-content">{{ $coaching->content ?: '...' }}</pre>
@endif
