<section id="contact">
    <div class="container d-flex" style="gap:20px;">
        <div id="panel_contact">
            <h3>{{__("Contact")}} / Hotline</h3>
            <h2>{{ theme_option('hotline') }}</h2>
            <form class="form-horizontal ajaxform" action="{{route("public.send.contact")}}" name="frmContact" id="frmContact" method="post">
                <div class="form-group required mt-2">
                    <input type="text" name="fullname" value="" placeholder="{{__("Full Name")}}" maxlength="256" required />
                </div>
                <div class="form-group required mt-2">
                    <input type="text" name="email" value="" placeholder="Email" maxlength="256" />
                </div>
                <div class="form-group required mt-2">
                    <input type="text" name="content" value=""placeholder="{{__("How can we help you")}}" maxlength="256" required />
                </div>
                <div class="mt-2 text-center">
                    <button type="submit" id="btnContact" name="btnContact">{{__("Send")}}</button>
                </div>
            </form>
            <div id="follow_on" style="display:none">
                <a href=""><img src="{{base}}asset/images/facebook.svg" alt=""></a>
                <a href=""><img src="{{base}}asset/images/tiktok.svg" alt=""></a>
                <a href=""><img src="{{base}}asset/images/instagram.svg" alt=""></a>
                <a href=""><img src="{{base}}asset/images/web.svg" alt=""></a>
            </div>
        </div>
        <div class="d-none d-md-block" style="max-width:30%;width:30%">
            @if(Language::getCurrentLocale()=="vi")
            <img src="{{base}}asset/images/bgcontact_icon_{{Language::getCurrentLocale()}}.png" alt="" class="img-fluid">
            @else
            <img src="{{base}}asset/images/bgcontact_icon_{{Language::getCurrentLocale()}}.svg" alt="" class="img-fluid">
            @endif
        </div>
    </div>
</section>
