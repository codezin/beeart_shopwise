@php Theme::set('pageName', $page->name) @endphp

@php
$cleverbox = get_page_by_id("16");
$peektoy = get_page_by_id("17");
@endphp
<main id="main">
    <section id="banner" class="banner-project banner-bg d-flex align-items-center" style="background-image: url('{{ RvMedia::getImageUrl($page->banner) }}')">
        <div class="container">
            <header class="section-header text-center">
                <h2>Dự án</h2>
            </header>
        </div>
    </section>

    <section id="title-page" class="title-page">
        <div class="container">
            <div id="breadcrumbs">
                <span>{{__("Home")}}</span>
                <span><i class="fa-light fa-angle-right"></i></span>
                <span>{{__("Project")}}</span>
            </div>
        </div>
    </section>

    <section id="projects" class="projects mt-5">
        <div class="container">
            <ul class="nav nav-tabs" id="projectTab" role="tablist">
                <li class="nav-item w-50 text-center" role="presentation">
                    <button class="nav-link {{@$cleverbox->name==$page->name?'active':''}}" id="cleverbox-tab" data-bs-toggle="tab" data-bs-target="#cleverbox-tab-pane" type="button" role="tab" aria-controls="cleverbox-tab-pane" aria-selected="true">{{@$cleverbox->name}}</button>
                </li>
                <li class="nav-item w-50 text-center" role="presentation">
                    <button class="nav-link  {{@$peektoy->name==$page->name?'active':''}}" id="peektoy-tab" data-bs-toggle="tab" data-bs-target="#peektoy-tab-pane" type="button" role="tab" aria-controls="peektoy-tab-pane" aria-selected="false">{{@$peektoy->name}}</button>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="projectTabContent">

            <div class="tab-pane fade  {{@$cleverbox->name==$page->name?'show active':''}}" id="cleverbox-tab-pane" role="tabpanel" aria-labelledby="cleverbox-tab" tabindex="0">
                <div class="container">
                    <h2 class="projects_title mt-5"> {{@$cleverbox->name}}</h2>
                    <div class="row mt-5">
                        <div class="col-lg-7 order-1 order-lg-0">
                            <div class="projects-text p-0 p-lg-4 mt-3 mt-lg-0">
                                {!! $cleverbox->description !!}
                            </div>
                        </div>
                        <div class="col-lg-5 order-0 order-lg-1" style="display:flex;        align-items: center;    padding-top: 70px;">
                            <img src="{{ RvMedia::getImageUrl($cleverbox->image) }}" alt="Cleverbox" class="img-fluid zoomImage" />
                        </div>
                    </div>


                </div>
                <div><img src="{{ RvMedia::getImageUrl(get_field($cleverbox," project_image")) }}" alt="Cleverbox" class="img-fluid" /></div>
                <div class="container">
                    <div class="shop_system">
                        <div class="title">
                            {{__('Stores')}}
                        </div>
                        <div class="row">
                            @php
                            $stores = get_field($cleverbox, "stores");
                            @endphp
                            @foreach ($stores as $s)
                            <div class="col-md-6" style="padding: 1rem 3rem 1rem 3rem">
                                <div class="box_shop" style="    margin-bottom: 0px;">
                                    <h3>{{get_sub_field($s,"store_title")}}</h3>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0"><img src="{{url('')}}themes/CleverWorld/asset/images/project_icon_addr.svg" alt="project_icon_addr2.svg"></div>
                                        <div class="flex-grow-1 ms-1">{{get_sub_field($s,"store_address")}}</div>
                                    </div>
                                    <div>
                                        <a href="tel:{{get_sub_field($s," store_phone")}}"><img src="{{url('')}}themes/CleverWorld/asset/images/project_icon_tel.svg" alt="project_icon_tel2.svg">
                                            {{get_sub_field($s,"store_phone")}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{-- {!! str_replace('src="','src="'.url('')."/", $cleverbox->content) !!} --}}
                        </div>
                    </div>
                    <div class="mb-5 text-center">
                        <a href="{{ theme_option('cleverbox') }}" class="btn-themes">{{__("Go to")}} CLEVERBOX
                            <img src="{{base}}asset/images/right-arrow-white.svg" />
                        </a>
                    </div>
                </div>

            </div><!-- ======= CLEVERBOX Tab ======= -->
            <div class="tab-pane fade {{@$peektoy->name==$page->name?'show active':''}}" id="peektoy-tab-pane" role="tabpanel" aria-labelledby="peektoy-tab" tabindex="0">
                <div class="container">
                    <h2 class="projects_title tab2 mt-5">{{$peektoy->name}}</h2>
                    <div class="row mt-5">
                        <div class="col-lg-7 order-1 order-lg-0">
                            <div class="projects-text p-0 p-lg-4 mt-3 mt-lg-0">
                                {!! $peektoy->description !!}
                            </div>
                        </div>
                        <div class="col-lg-5 order-0 order-lg-1" style="display:flex;        align-items: center;    padding-top: 70px;">
                            <img src="{{ RvMedia::getImageUrl($peektoy->image) }}" alt="Cleverbox" class="img-fluid zoomImage" />
                        </div>
                    </div>

                </div>

                <div><img src="{{ RvMedia::getImageUrl(get_field($peektoy," project_image")) }}" alt="Peektoy" class="img-fluid" /></div>
                <div class="container">
                    <div id="shop_system2" class="shop_system">
                        <div class="title">
                            {{__("Stores")}}
                        </div>
                        <div class="row">
                            @php
                            $stores = get_field($peektoy, "stores");
                            @endphp
                            @foreach ($stores as $s)
                            <div class="col-md-6" style="padding: 1rem 3rem 1rem 3rem">
                                <div class="box_shop" style="    margin-bottom: 0px;">
                                    <h3>{{get_sub_field($s,"store_title")}}</h3>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0"><img src="{{url('')}}themes/CleverWorld/asset/images/project_icon_addr2.svg" alt="project_icon_addr2.svg"></div>
                                        <div class="flex-grow-1 ms-1">{{get_sub_field($s,"store_address")}}</div>
                                    </div>
                                    <div>
                                        <a href="tel:{{get_sub_field($s,'store_phone')}}">
                                            <img src="{{url('')}}themes/CleverWorld/asset/images/project_icon_tel2.svg" alt="project_icon_tel2.svg">
                                            {{get_sub_field($s,"store_phone")}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            {{-- {!! str_replace('src="','src="'.url('')."/", $peektoy->content) !!} --}}
                        </div>
                    </div>

                    <div class="mb-5 text-center">
                        <a href="{{theme_option('peektoy')}}" class="btn-themes">{{__("Go to")}} PEEKTOY
                            <img src="{{base}}asset/images/right-arrow.svg" />
                        </a>
                    </div>
                </div>

            </div><!-- ======= PEEKTOY Tab ======= -->
        </div>

    </section>

    {!! Theme::partial('section.contact') !!}
</main>
