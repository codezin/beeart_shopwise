<ul>
    @php $menu_nodes->loadMissing('metadata');  @endphp
    @foreach ($menu_nodes as $key => $row)
        <li><a href="{{url($row->url)}}">{{ $row->title }}</a></li>
    @endforeach
</ul>
