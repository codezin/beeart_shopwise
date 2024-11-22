@php Theme::set('pageName', $page->name) @endphp
@php
    Theme::set('page', $page);
@endphp


<div id="app">

    @if ($page->template === 'homepage')

         {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, Html::tag('div', BaseHelper::clean($page->content), ['class' =>

'ck-content'])->toHtml(), $page) !!}

    @else

        <div class="section">

            <div class="container">

                {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, Html::tag('div', BaseHelper::clean($page->content), ['class' =>

'ck-content'])->toHtml(), $page) !!}

            </div>

        </div>

    @endif

</div>

