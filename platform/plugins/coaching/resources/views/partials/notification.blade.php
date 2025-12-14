<li class="dropdown dropdown-extended dropdown-inbox">
    <a href="javascript:;" class="dropdown-toggle dropdown-header-name" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="icon-envelope-open"></i>
        <span class="badge badge-default"> {{ $coachings->total() }} </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-right">
        <li class="external">
            <h3>{!! BaseHelper::clean(trans('plugins/coaching::coaching.new_msg_notice', ['count' => $coachings->total()])) !!}</h3>
            <a href="{{ route('coachings.index') }}">{{ trans('plugins/coaching::coaching.view_all') }}</a>
        </li>
        <li>
            <ul class="dropdown-menu-list scroller" style="height: {{ $coachings->total() * 70 }}px;" data-handle-color="#637283">
                @foreach($coachings as $coaching)
                    <li>
                        <a href="{{ route('coachings.edit', $coaching->id) }}">
                            <span class="photo">
                                <img src="{{ $coaching->avatar_url }}" class="rounded-circle" alt="{{ $coaching->name }}">
                            </span>
                            <span class="subject"><span class="from"> {{ $coaching->name }} </span><span class="time">{{ $coaching->created_at->toDateTimeString() }} </span></span>
                            <span class="message"> {{ $coaching->phone }} - {{ $coaching->email }} </span>
                        </a>
                    </li>
                @endforeach

                @if ($coachings->total() > 10)
                    <li class="text-center"><a href="{{ route('coachings.index') }}">{{ trans('plugins/coaching::coaching.view_all') }}</a></li>
                @endif
            </ul>
        </li>
    </ul>
</li>
