@php Theme::set('pageName', $page->name) @endphp



            @if ($page->template === 'homepage')
                {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, Html::tag('div', BaseHelper::clean($page->content), ['class' => 'ck-content'])->toHtml(), $page) !!}

            @elseif ($page->id == '10')

            <main class="page-content">
                <section class="title-header dark">
                    <h2>{{ Theme::get('pageName') }}</h2>
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('public.index') }}">{{__("Home")}}</a></li>
                        <li><a href="#">{{ Theme::get('pageName') }}</a></li>
                    </ul>

                </section>

                <section class="about-us-detail-section">
                    <div class="container">
                        {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, Html::tag('div', $page->content, ['class' => 'ck-content'])->toHtml(), $page) !!}
                    </div>
                </section>
                <style type="text/css">
                figure.table table{
                    /* border: 1px solid #efede9; */
                }
                figure.table table thead th{
                    /* background: rgb(229 226 218); */
                    background: url("{{url("public/themes/jangseang/img/th_bg.jpg")}}");
                    border-right: 1px solid #efede9;
                    border-bottom: 1px solid #efede9;
                    white-space: nowrap;
                    color: #fff;
                }
                figure.table table tbody td{
                    background: rgb(255, 253, 248);
                    border-right: 1px solid #efede9;
                    border-bottom: 1px solid #efede9;
                    padding: 0.2em 0.5em;
                }
                </style>
            </main>

            @else
                {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, Html::tag('div', $page->content, ['class' => 'ck-content'])->toHtml(), $page) !!}
            @endif


