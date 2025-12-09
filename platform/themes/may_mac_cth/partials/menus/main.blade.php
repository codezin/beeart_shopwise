<ul {!! $options !!}>
    @php $menu_nodes->loadMissing('metadata'); @endphp
    @foreach ($menu_nodes as $key => $row)
    <li @if ($row->has_child || $row->css_class || $row->active) class="@if ($row->has_child) dropdown has-dropdown @endif @if ($row->css_class) {{ $row->css_class }} @endif " @endif>
        <a class="@if ($row->has_child) dropdown-toggle nav-link @else nav-link nav_item @endif @if ($row->active) active @endif" href="{{ $row->has_child ? '#' : url($row->url) }}" @if ($row->target !== '_self') target="{{ $row->target }}" @endif @if ($row->has_child) data-toggle="dropdown" @endif>
            @if ($iconImage = $row->getMetadata('icon_image', true))
            <img src="{{ RvMedia::getImageUrl($iconImage) }}" alt="icon image" width="14" height="14" style="vertical-align: top; margin-top: 3px" loading="lazy" />
            @elseif ($row->icon_font) <i class="{{ trim($row->icon_font) }}"></i>  @endif <span> {{ $row->title }} </span> @if ($row->has_child)<i class="bi bi-chevron-down"></i> @endif
        </a>
        @if ($row->has_child)

        {!! Menu::generateMenu([
        'menu' => $menu,
        'menu_nodes' => $row->child,
        'view' => 'sub-menu',
        'options' => ['class' => 'dd-box-shadow']
        ]) !!}

        @endif
    </li>
    @endforeach

</ul>
