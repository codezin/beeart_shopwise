<footer>

    <div class="container">
        <div class="footer-columns">
            <div class="footer-column info">
                <div class="info-logo">
                    <img src="{{ RvMedia::getImageUrl(theme_option('logo_footer')) }}" alt="Jang Seang Korea" srcset="" />
                    <img src="{{ RvMedia::getImageUrl(theme_option('logo_footer_2')) }}" alt="Jang Seang Korea" srcset="" />
                </div>
                <div class="info-company">
                    {!! theme_option("footer-information") !!}
                   {{-- <ul>
                        <li>
                        Tên công ty: <b> Công ty Cổ phần Thương mại JangSeang Insam</b> </li>
                        <li>Tên quốc tế:  <b>JANGSEANG GINSENG TRADE JOINT STOCK COMPANY </b></li>
                        <li>Mã số thuế:  <b>0110156049 </b></li>

                        <li>Website:  <b>jangseang.com</b>
                        </li>
                    </ul> --}}
                    {{-- <p><strong>{{__("Company name")}}:</strong> Công ty Cổ phần Thương mại Jang Seang Korea</p>
                    <p><strong>{{__("International name")}}:</strong> JANGSEANG KOREA TRADE JOINT STOCK COMPANY</p>
                    <p><strong>{{__("Tax code")}}:</strong> 0110156049</p> --}}
                </div>
                <div class="footer-hotline">
                    <div class="footer-hotline-wrapper">
                        <h3>{{__("JangSeang Farm")}}<br />{{__("Hotline")}}:</h3>
                        <span style="   display: inline-block;    min-width: 135px;    text-align: right;">
                            {{-- <a href="tel:+(82)10.5738.5566">+(82)10.5738.5566</a>
                            <a href="tel:+82 10 7514 6777">+(82)10.7514.6777</a> --}}
                            <a href="tel:+82 10 7514 6777">+(82)10.7514.6777</a>
                            <a href="#">&nbsp;</a>
                        </span>
                    </div>
                    <div class="footer-hotline-wrapper">
                        <h3>
                           {{__("JangSeang Pharma")}} <br />{{__("Hotline")}}:
                        </h3>
                        <span style="    display: inline-block;    min-width: 135px;    text-align: right;">
                            <a href="tel:+(82)10.5738.5566">+(82)10.5738.5566</a>
                            <a href="#">&nbsp;</a>
                            {{-- <a href="tel:+82 10 6287 6886">+(82)10.6287.6886</a>
                            <br />
                            <a href="tel:+82 10 9226 3888">+(82)10.9226.3888</a> --}}
                        </span>
                    </div>
                </div>
            </div>

            <div class="footer-column">
                <h3>{{__("Ecosystem")}}</h3>
                {!! Menu::renderMenuLocation('categories-menu', ['view' => 'menus.footer', 'options' => ['class' => '']]) !!}

            </div>

            <div class="footer-column">
                <h3>{{(__("Link"))}}</h3>
                {!! Menu::renderMenuLocation('footer-menu', ['view' => 'menus.footer', 'options' => ['class' => '']]) !!}
            </div>

            <div class="footer-column">
                <h3>{{__("Customer support")}}</h3>
                {!! Menu::renderMenuLocation('links-menu', ['view' => 'menus.footer', 'options' => ['class' => '']]) !!}
            </div>

            <div class="footer-column">
                {{-- <h3>{{__("Connect with us")}}</h3> --}}
                <h3>Contact us</h3>
                @if (theme_option('social_links'))
                <ul class="social-links">
  @foreach(json_decode(theme_option('social_links'), true) as $socialLink)
                    @if(strtolower($socialLink[0]['value'])=="facebook")
                    <li>
                        <a href="{{ $socialLink[2]['value'] }}"><img src="{{base}}img/facebook.svg" alt="Facebook" /></a>
                    </li>
                    @elseif(strtolower($socialLink[0]['value'])=="tiktok")
                    <li>
                        <a href="{{ $socialLink[2]['value'] }}"><img src="{{base}}img/tiktok.svg" alt="TikTok" /></a>
                    </li>
                    @elseif(strtolower($socialLink[0]['value'])=="instagram")
                    <li>
                        <a href="{{ $socialLink[2]['value'] }}"><img src="{{base}}img/instagram.svg" alt="Instagram" /></a>
                    </li>
                    @else
                    <li>
                        <a href="{{ $socialLink[2]['value'] }}"
                            title="{{ $socialLink[0]['value'] }}" style="background-color: {{ $socialLink[3]['value'] }}; border: 1px solid {{ $socialLink[3]['value'] }};" target="_blank">
                            <i class="{{ $socialLink[1]['value'] }}"></i>
                        </a>
                    </li>
                    @endif
                    @endforeach
                    <!-- <li>
                        <a href="https://www.facebook.com/ongchuhanquoc/"><img src="{{base}}img/facebook.svg" alt="Facebook" /></a>
                    </li>
                    <li>
                        <a href="https://www.tiktok.com/@nongtrainhansamohanquoc?is_from_webapp=1&sender_device=pc"><img src="{{base}}img/tiktok.svg" alt="TikTok" /></a>
                    </li>
                    <li>
                        <a href="#"><img src="{{base}}img/instagram.svg" alt="Instagram" /></a>
                    </li>       -->
                </ul>
                @endif
                <div class="map">
                    {!! theme_option("google_map") !!}
                </div>
            </div>
        </div>
	<div class="footer-brand">
        <p>{{theme_option("copyright")}}</p>
    </div>
    </div>

</footer>
{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/3d-flip-book@1.9.9/js/pdf.worker.js"></script> --}}
<script src="{{base}}js/libs/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/3d-flip-book@1.9.9/js/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/3d-flip-book@1.9.9/js/three.min.js"></script>
{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/3d-flip-book@1.9.9/js/pdf.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/3d-flip-book@1.9.9/dist/flip-book.min.js"></script> --}}

<script type="text/javascript" src="{{base}}slick/slick.min.js"></script>
<script type="text/javascript" src="{{base}}js/select2.min.js"></script>
<script type="text/javascript" src="{{base}}js/main.js{{@$version}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
    AOS.init();
  </script>
<script>

    var current_page = 1;
    var total_page =   $('.list-products-section-list').data("total_page");
    $('.pagination a').on('click', function(e) {
           e.preventDefault();
           var page = $(this).attr('href').split('page=')[1];
           getPosts(page);
     });
     $(document).on("click","#btn-view-more",function(){
        current_page = current_page+1;
        getPosts(current_page);
     });
     function getPosts(page)
     {
        tag =  $('.list-products-section-list');
          $.ajax({
               type: "GET",
               url:  'https://jangseang.com/ajax/products?lang={{Language::getCurrentLocale()}}&&category='+tag.data("category")+'&&limit='+$('.list-products-section-list').data("limit")+'&page='+page
          })
          .success(function(data) {
            bindHtml = '';
            $.each(data.data,function(index,item){
                bindHtml += item;

            })
            $('.list-products-section').find('.list-products-section-list').append(bindHtml);
            if(current_page==total_page)
            {
                $("#btn-view-more").hide();
            }
            $(".list-products-section-list-card").on("click",function(){
                html = $(this).html();
                $("#product-detail").find(".list-products-section-list-card").html(html);
                $("#product-detail").find(".list-products-section-list-card").find(".description").hide();
                $("#product-detail").find(".list-products-section-list-card").find(".content").show();
                $("#product-detail").show();
            });

            $("#product-detail .close").on("click",function(){
                $("#product-detail").hide();
            })
                        // console.log(data);
            //     e  = $.parseHTML(data.data);
            //     alert(e.find(".list-products-section-list").html());
            //    $('.list-products-section-list').html(e.find(".list-products-section-list").html());
          });
     }
  </script>
</body>

</html>
