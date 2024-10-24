{!! Theme::partial('header') !!}
@php

$page = get_page_by_id(4);
$mission = get_field($page,"mission");
@endphp

<main id="main">
    <section id="banner" class="banner-about banner-bg d-flex align-items-center" style="background-image: url('{{ RvMedia::getImageUrl($page->banner) }}')">
        <div class="container">
            <header class="section-header text-center">
                <h2>{{$page->name}}</h2>
            </header>
        </div>
    </section>

    <section id="title-page" class="title-page">
        <div class="container">
            <div id="breadcrumbs">
                <span>{{__("Home")}}</span>
                <span><i class="fa-light fa-angle-right"></i></span>
                <span>{{$page->name}}</span>
            </div>
        </div>
    </section>

    <section id="about-us" class="about-us mt-5">
        <div class="container">
            <div class="row">
                <div class="order-1 order-lg-0 col-xxl-6 col-xl-8 col-md-12">
                    <div class="about-us-text">
                        <h3>{{$page->name}}</h3>
                        <h2>CLEVER WORLD</h2>
                        <p class="mt-3"> {!! $page->content !!} </p>
                    </div>
                </div>
                <div class="order-0 order-lg-1 col-xxl-6 col-xl-4 col-md-12" style="display:flex;        align-items: center;">
                    <img src="{{ RvMedia::getImageUrl($page->image) }}" alt="" class="img-fluid"/>
                </div>
            </div>
        </div></section><!-- ======= Aboutus Section ======= -->

    <section id="about-us-history" class="about-us-history mt-5">
        <div class="container">
            <header class="section-header text-center swidth" data-aos="fade-top">
                <h2>{{get_field($page,"history_title")}}</h2>
                <p> {{get_field($page,"history_description")}}</p>
            </header>

            <div id="path_history">
                @if(!empty($history = get_field($page,"history")))
                @foreach ($history as $r)
                @if($loop->index%2==0)
                <div class="row d-flex align-items-center justify-content-center mb-5">
                    <div class="col-3 col-lg-5 d-none d-md-block">
                        <img src="{{ RvMedia::getImageUrl(get_sub_field($r,"history_image")) }}" alt="" class="img-fluid"/>
                    </div>
                    <div class="col-1 col-lg-2 d-sm-none d-md-block">  
		    	<div class="history_year year1">
                                <span>{{get_sub_field($r,"history_year")}}</span>
                        </div>
                        <!-- <div class="history_point point{{$loop->index+1}}"></div> -->
                    </div>
                    <div class="col-8 col-lg-5 history_content" style="text-align: justify;">   
	
                        {!! get_sub_field($r,"history_description") !!}
					
                    </div>
                </div>
                @else
                <div class="row d-flex align-items-center justify-content-center mb-5">

                    <div class="col-8 col-lg-5 order-2 order-md-0 history_content" style="text-align: justify;"> 
		
                        <p >   {!! get_sub_field($r,"history_description") !!}</p>  
	
                    </div>
                    <div class="col-1 col-md-2 order-1 order-md-1">
                        <!-- <div class="history_point point{{$loop->index+1}}"></div> -->
			 			<div class="history_year year2">
                            <span>{{get_sub_field($r,"history_year")}}</span>
                        </div>
                    </div>
                    <div class="col-3 col-lg-5 order-0 order-md-2 d-none d-md-block">     
		   	 			<img src="{{ RvMedia::getImageUrl(get_sub_field($r,"history_image")) }}" alt="" class="img-fluid"/>
                       
                    </div>
                </div>
                @endif
                @endforeach
                @endif


            </div>

        </div>
    </section>

    <section id="about-us-mission" class="about-us-mission mt-5">
        <div class="container">
            <header class="section-header text-center swidth" data-aos="fade-top">
                <h2>{!! get_field($page,"mission_vision_title") !!}</h2>
            </header>

            <div class="row  justify-content-center mt-3 mt-lg-0">
                <!--<div class="col-lg-4" data-aos="fade-down">
                    <img src="{{base}}asset/images/mission1.png" alt="Tầm nhìn, sứ mệnh" class="img-fluid zoomImage"/>
                </div>  
                <div class="col-lg-4 p-2 p-lg-5 mt-5 mt-lg-0" data-aos="fade-down">
                    <div class="text-center"><img src="{{ RvMedia::getImageUrl(get_field($page,"mission_image")) }}" alt="Tầm nhìn" class="img-fluid zoomImage"/></div>
                    <h4 class="mt-4">{{get_field($page,"mission_title")}}</h4>
                    <div> {!! get_field($page,"mission_description") !!} </div>
                </div>
                <div class="col-lg-4 p-2 p-lg-5 mt-5 mt-lg-0" data-aos="fade-down">
                    <div class="text-center"><img src="{{ RvMedia::getImageUrl(get_field($page,"vision_image")) }}" alt="Sứ mệnh" class="img-fluid zoomImage"/></div>
                    <h4 class="mt-4">{{get_field($page,"vision_title")}}</h4>
                    <div>{!! get_field($page,"vision_description") !!}</div>
                </div>   
				 -->  
				  <div class="col-lg-6 p-2 p-lg-5 mt-5 mt-lg-0 mt-m-1" data-aos="fade-down">
                    <div class="text-center" style="zoom: 70%;"><img src="{{ RvMedia::getImageUrl(get_field($page,"mission_image")) }}" alt="Tầm nhìn" class="img-fluid zoomImage"/></div>
                    <h4 class="mt-4">{{get_field($page,"mission_title")}}</h4>
                    <div > {!! get_field($page,"mission_description") !!}</div>
                </div>
                <div class="col-lg-6 p-2 p-lg-5 mt-3 mt-lg-0 mt-m-1" data-aos="fade-down">
                    <div class="text-center" style="zoom: 70%;"><img src="{{ RvMedia::getImageUrl(get_field($page,"vision_image")) }}" alt="Sứ mệnh" class="img-fluid zoomImage"/></div>
                    <h4 class="mt-4">{{get_field($page,"vision_title")}}</h4>
                    <div >{!! get_field($page,"vision_description") !!}</div>
                </div>  
            </div>
        </div>
    </section>

    <section id="core-values" class="core-values">
        @php
        $block = get_blocks_by_slug("corevalue");
        $items = get_field($block,"block_why_you_love_us");
        @endphp
        <div class="container">
            <header class="section-header text-center swidth" data-aos="fade-top">
                <h2>{{$block->name}}</h2>
            </header>
            <div class="row d-flex align-items-center justify-content-center">
                @if(!empty( $items))
                @foreach(  $items as $item)
                <div class="col-4 col-lg text-center" data-aos="fade-down">
                    <div class="box-values">
                        <div class="img d-flex align-items-end"><img src="{{ RvMedia::getImageUrl(get_sub_field($item,"image")) }}" alt="{{get_sub_field($item,"name")}}"
                                class="img-fluid zoomImage" /></div>
                        <h4>{{get_sub_field($item,"name")}}</h4>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>

    <section id="about-us-logo" class="about-us-logo">
        <div class="container">
            <div class="row">
                <div class="col-md-3">          
					<div class="p-2 text-center">
						<img src="{{ RvMedia::getImageUrl(get_field($page,"y_nghia_logo_image")) }}" alt="Ý nghĩa logo" class="img-fluid zoomImage"/>  
					</div>
				</div>
                <div class="col-md-9 mt-3 mt-lg-0">
                    <div class="about-us-text p-2 ">
                        <h2>{{get_field($page,"y_nghia_logo")}}</h2>
                        {!! get_field($page,"y_nghia_logo_description") !!}
                    </div>
                </div>
            </div>
        </div></section>

    <section id="about-us-team" class="about-us-team">
        <div class="container">
            <header class="section-header text-center swidth" data-aos="fade-top">
                <h2>{{get_field($page,"doi_ngu")}}</h2>
                {!! get_field($page,"doi_ngu_desc") !!}     
				<br/><br/>  
				 
            </header>
	    <img src="{{ RvMedia::getImageUrl(get_field($page,"doi_ngu_image")) }}" class="img-fluid" alt="">
        </div>
    </section>

    <section id="about-us-prize" class="about-us-prize" style="display:none">
        @php
            $block = get_blocks_by_slug("giai-thuong");
        @endphp
        <div class="container">
        <div id="box_prize" >
            <header class="section-header text-center swidth" data-aos="fade-top">
                <h2>{{  $block->name }}</h2>
                <p> {!! $block->content !!}</p>
            </header>

            <div class="swiper prizeSwiper mt-5">
                <div class="swiper-wrapper">
                    @php
                        $items = get_field($block,"giai_thuong_items");       
                    @endphp
                    @if(!empty($items))
                    @foreach( $items as $r)
                    <div class="swiper-slide">
                        <div class="box-item">
                            <img src="{{ RvMedia::getImageUrl(get_sub_field($r,"image_17217913043")) }}" class="img-fluid" alt="">
                            @if(get_sub_field($r,"description")!="5star")
                            <h3>{{get_sub_field($r,"title_17217913041")}}</h3>
                            @else
                            <div class="stars">
                                <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i>
                            </div>
                            @endif
                            <div>{{ get_sub_field($r,"description")}}</div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>

                <div class="swiper-button-next-01"><i class="fa-solid fa-chevron-right"></i></div>
                <div class="swiper-button-prev-01"><i class="fa-solid fa-chevron-left"></i></div>
            </div>
        </div>
        </div>
    </section>

    {!! Theme::partial('section.contact') !!}
</main>
{{-- {!! Theme::content() !!} --}}
{!! Theme::partial('footer') !!}
