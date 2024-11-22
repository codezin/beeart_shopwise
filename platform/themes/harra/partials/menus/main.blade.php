<ul class="w-100 d-xl-flex align-items-center justify-content-between">
    @php $menu_nodes->loadMissing('metadata'); @endphp
    @php $menu_nodes->loadMissing('metadata'); @endphp
    @foreach ($menu_nodes as $key => $row)
    <li @if ($row->has_child || $row->css_class || $row->active) class="@if ($row->has_child) dropdown has-dropdown @endif @if ($row->css_class) {{ $row->css_class }} @endif " @endif>

        <a class="@if ($row->active) active @endif" href="{{ $row->has_child ? '#' : url($row->url) }}" @if ($row->target !== '_self') target="{{ $row->target }}" @endif @if ($row->has_child) data-toggle="dropdown" @endif>
            <span> {{ $row->title }} </span>
            @if ($row->has_child) <i class="bi bi-chevron-down dropdown-indicator"></i>@endif
        </a>

        @if ($row->has_child)

        {!! Menu::generateMenu([
        'menu' => $menu,
        'menu_nodes' => $row->child,
        'view' => 'menus.sub-menu',
        'options' => ['class' => 'dd-box-shadow']
        ]) !!}

        @endif
    </li>
    @endforeach
</ul>
