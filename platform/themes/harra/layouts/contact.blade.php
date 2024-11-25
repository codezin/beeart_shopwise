{!! Theme::partial('header') !!}
<link rel="stylesheet" href="{{base}}assets/css/contact-us.css" />
@php
$page = get_page_by_id(4);
@endphp
<main id="main">

    <section id="contact" class="contact">
        <div class="container d-flex justify-content-center align-items-center">
            <div id="contact-panel" class="d-flex justify-content-center align-items-center">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-5 info-item">
                        <p class="title">Got a question? We’re on it! We’ll get back to you in 2 hours or less :>>> lightning fast ❤</p>
                        <p class="mt-4">
                            <div><span><i class="fa-solid fa-envelope"></i> Email</span></div>
                            <div><a href="mailto:lilharrastore@gmail.com">lilharrastore@gmail.com</a></div>
                        </p>
                        <p class="mt-4">
                        <div><span><i class="fa-solid fa-location-dot"></i> Pick Up Location</span></div>
                        <div>MD 20723</div>
                        <div>The pick up location will be shared once the order payment is completed</div>
                        </p>
                    </div>
                    <div class="col-md-7">
                        <form action="#" method="post" role="form" class="frmcontact">
                            <div class="row">
                                <div class="col-xl-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-xl-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="How can we help?*" required></textarea>
                            </div>
                            <div><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section id="follow-us" class="follow-us">
          <div class="container">
              <div class="d-flex align-items-center justify-content-between">
                  <h2 class="title">Follow us for more</h2>
                  <div><a href=""><img src="assets/img/tiktok.png" alt=""/> @bouquetbylilharra</a></div>
                  <div><a href=""><img src="assets/img/instagram.png" alt=""/> lilharra.blooms</a></div>
              </div>

              <div id="follow-list" class="d-flex align-items-center justify-content-between mt-5">
                  <div class="imgbox"><img src="assets/img/follow-us/follow-us1.png" alt=""/></div>
                  <div class="imgbox"><img src="assets/img/follow-us/follow-us3.png" alt=""/></div>
                  <div class="imgbox"><img src="assets/img/follow-us/follow-us1.png" alt=""/></div>
                  <div class="imgbox"><img src="assets/img/follow-us/follow-us2.png" alt=""/></div>
                  <div class="imgbox"><img src="assets/img/follow-us/follow-us4.png" alt=""/></div>
              </div>

          </div>
    </section>
</main><!-- End #main -->
<!-- END MAIN CONTENT -->
{!! Theme::partial('footer') !!}
