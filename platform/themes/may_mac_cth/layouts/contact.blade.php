{!! Theme::partial('header') !!}
<link rel="stylesheet" href="{{ base }}assets/css/contact.css" />
@php
    $page = Theme::get('page');
@endphp

<section class="contact-section">
    <div class="title-section">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <div class="page-title">{{ $page->name }}</div>
            <div class="breadcrumb-nav" id="breadcrumb">
                <a href="{{ route('public.index') }}">Trang chủ</a>
                <span class="sep"> &gt; </span>
                <span class="current">{{ $page->name }}</span>
            </div>
        </div>
    </div>

    <div class="contact-info-blocks py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-box">
                        <i class="bx bx-map-alt"></i>
                        <p id="contactAddress">{{theme_option("address")}}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-box">
                        <i class="bx bx-envelope"></i>
                        <p id="contactWebsite">{{theme_option("website")}}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-lg-4">
                    <div class="contact-info-box">
                        <i class="bx bx-phone"></i>
                        <p id="contactPhone">{{theme_option("hotline")}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-form-section pb-5" id="feedbackForm">
        <div class="container position-relative" style="z-index: 2;">
            <h2 class="contact-title">LIÊN HỆ</h2>
            {!! Form::open(['route' => 'public.send.contact', 'method' => 'POST', 'class' => 'contact-form-container']) !!}

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Tên <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tên" required="">
                        </div>
                        <div class="form-group mt-3">
                            <label for="address" class="form-label">Địa chỉ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ">
                        </div>
                        <div class="form-group mt-3">
                            <label for="subject" class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Tiêu đề">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                        </div>
                        <div class="form-group mt-3">
                            <label for="phone" class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Số điện thoại">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mt-3">
                            <label for="message" class="form-label">Nội dung <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="message"  name="content" rows="5" placeholder="Nội dung" required=""></textarea>
                        </div>
                    </div>
					    {!! apply_filters('after_contact_form', null) !!}
    					<div class="contact-form-group"><p>{!! BaseHelper::clean(__('The field with (<span style="color:#FF0000;">*</span>) is required.')) !!}</p></div>
							 @if(session('error'))
						    <div class="alert alert-danger">
						        {{ session('error') }}
						    </div>
						@endif
						   @if(session('success'))
						    <div class="alert alert-success">
						        {{ session('success') }}
						    </div>
						@endif
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-submit-contact">Gửi tin nhắn</button>
                    </div>
                </div>
            {!! Form::close() !!}
			<script>
				$(document).ready(function() {

				    $('form.contact-form').on('submit', function(e) {
				        e.preventDefault();

				        let form = $(this);
				        let actionUrl = form.attr('action');
				        let formData = new FormData(this);

				        $('#errorBox').addClass('d-none').html('');
				        $('#successBox').addClass('d-none').html('');

				        $.ajax({
				            url: actionUrl,
				            type: 'POST',
				            data: formData,
				            processData: false,
				            contentType: false,
				            success: function(response) {

				                // Nếu bạn return JSON {status: true/false, message: "..."}
				                if (response.status) {
				                    $('#successBox')
				                        .removeClass('d-none')
				                        .html(response.message);

				                    form[0].reset();
				                } else {
				                    $('#errorBox')
				                        .removeClass('d-none')
				                        .html(response.message);
				                }
				            },
				            error: function(xhr) {

				                // Nếu validate lỗi Laravel (422)
				                if (xhr.status === 422) {
				                    let errors = xhr.responseJSON.errors;
				                    let errorHtml = '';

				                    $.each(errors, function(key, value) {
				                        errorHtml += '<p>' + value[0] + '</p>';
				                    });

				                    $('#errorBox')
				                        .removeClass('d-none')
				                        .html(errorHtml);
				                } else {
				                    $('#errorBox')
				                        .removeClass('d-none')
				                        .html('Something went wrong. Please try again.');
				                }
				            }
				        });
				    });

				});
				</script>
        </div>
    </div>
</section>
{!! Theme::partial('footer') !!}
