@php $menu_nodes->loadMissing('metadata'); @endphp
@foreach ($menu_nodes as $key => $row)
    <li @if ($row->has_child || $row->css_class || $row->active)
        class="nav-item @if ($row->has_child) dropdown-custom @endif @if ($row->css_class) {{ $row->css_class }} @endif "  @endif>
        <a class=" @if ($row->has_child) dropdown-toggle nav-link @else nav-link nav_item @endif @if ($row->active) active @endif"
            href="{{ url($row->url) }}" @if ($row->target !== '_self') target="{{ $row->target }}" @endif
            {{-- @if ($row->has_child) data-toggle="dropdown" @endif --}}
            >
            @if ($iconImage = $row->getMetadata('icon_image', true))
                <img src="{{ RvMedia::getImageUrl($iconImage) }}" alt="icon image" width="14" height="14" style="vertical-align: top; margin-top: 3px" loading="lazy" />
            @elseif ($row->icon_font)
                <i class="{{ trim($row->icon_font) }}"></i> @endif <span> {{ $row->title }} </span>
                @if ($row->has_child)<i class="bi bi-chevron-down"></i> @endif
        </a>
        @if ($row->has_child)

            {!! Menu::generateMenu([
                'menu' => $menu,
                'menu_nodes' => $row->child,
                'view' => 'menus.sub-menu',
                'options' => ['class' => 'dropdown-menu-custom','id'=>'newsCategoryDropdown'],
            ]) !!}

        @endif
    </li>
@endforeach
{{-- <li class="nav-item"><a class="nav-link" href="index.html">Trang chủ</a></li>
    <li class="nav-item"><a class="nav-link" href="about-us.html">Về chúng tôi</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="products.html">Sản phẩm</a></li>
    <li class="nav-item"><a class="nav-link" href="guide.html">Hướng dẫn</a></li>
    <li class="nav-item dropdown-custom">
        <a href="news.html" class="nav-link text-warning d-flex align-items-center">
            Tin tức <i class='bx bx-chevron-down' style="font-size: 20px;"></i>
        </a>
        <ul class="dropdown-menu-custom" id="newsCategoryDropdown">
            <li class="text-center py-3"><small class="text-muted">Đang tải danh mục...</small></li>
        </ul>
    </li>
    <li class="nav-item"><a class="nav-link" href="contact.html">Liên hệ</a></li> --}}
