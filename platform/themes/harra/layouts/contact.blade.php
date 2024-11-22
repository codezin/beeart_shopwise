{!! Theme::partial('header') !!}
<link rel="stylesheet" href="{{base}}assets/css/contact-us.css" />
@php

$page = get_page_by_id(4);
// $mission = get_field($page,"mission");
@endphp

<div class="main_content">
    <!-- START SECTION CONTACT -->
    <div class="section pt_80 pb_56 section-contact-us-page">
        <div class="container">
            <h2 class="heading_h2">Contact us</h2>
            <p class="text-center">
                Our customer service team:
                <br />
                Monday-Saturday: 9:00 AM to 6.00 PM (Central Standard Time)   <br />
                Phone: <a href="tel:0402 423 159"> 0402 423 159</a><br />
Email: <a href="mailto:Catering@andi.melbourne">Catering@andi.melbourne</a>
            </p>
            <div class="row contact-info-wrapper">
                <div class="col-xl-6 col-md-6">
                    <div class="contact_wrap contact_style3">
                        <div class="contact-icon">
                            <img src="{{base}}assets/images/icons/phone.svg" />
                        </div>
                        <div class="contact_text">
                            <span>Phone</span>
                            <a href="tel:0402423159">{{theme_option("hotline")}} </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="contact_wrap contact_style3">
                        <div class="contact-icon">
                            <img src="{{base}}assets/images/icons/mail.svg" />
                        </div>
                        <div class="contact_text">
                            <span>Email</span>
                            <a href="mailto:info@andi.melbourne">info@andi.melbourne</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION CONTACT -->

    <!-- START SECTION CONTACT -->
    <div class="section pt-0 pb_80 section-contact-us-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading_s1">
                        <p class="fw-semibold text-center mb-4">
                            WE'D LOVE TO HEAR FROM YOU
                        </p>
                    </div>

                    <div class="field_form">
                        <form method="post" name="enq">
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <input required placeholder="Your Name*" id="first-name" class="" name="name" type="text" />
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <input required placeholder="Email*" id="email" class="" name="email" type="email" />
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <textarea required placeholder="Message*" id="description" class="" name="message" rows="4"></textarea>
                                </div>
                                <div class="col-md-12 mb-3 text-center">
                                    <button type="submit" title="Submit Your Message!" class="btn btn-fill-out" id="submitButton" name="submit" value="Submit">
                                        Send message
                                    </button>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div id="alert-msg" class="alert-msg text-center"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION CONTACT -->
</div>
<!-- END MAIN CONTENT -->
{!! Theme::partial('footer') !!}
