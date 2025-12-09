
    @php $menu_nodes->loadMissing('metadata');  @endphp
    @foreach ($menu_nodes as $key => $row)

        <div class="col-md-6 mb-3"><a href="{{url($row->url)}}">{{ $row->title }}</a></div>

    @endforeach
