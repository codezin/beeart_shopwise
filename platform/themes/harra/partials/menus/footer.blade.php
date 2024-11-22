

    @php $menu_nodes->loadMissing('metadata');  @endphp

    <ul class="widget_links">
        @foreach ($menu_nodes as $key => $row)
        <li><a href="{{url($row->url)}}">{{ $row->title }}</a></li>
        @endforeach
    </ul>
