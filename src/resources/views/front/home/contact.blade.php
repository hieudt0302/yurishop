
@extends('layouts.master')
@section('title','Pô Kô Farms - '.__('header.contact'))
@section('content')

<section class="page-header mb-lg">

    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>

            <li class="active">Liên hệ</li>
        </ul>
    </div>
</section>

<div class="container">

    <div class="row">
        <br><br><br>
        <div class="col-md-6">
            @if (session()->has('success_message'))
            <div class="alert alert-success mt-lg" id="contactSuccess">
                <strong>Thành công!</strong> Tin nhắn của bạn đã được gửi tới chúng tôi.
            </div>
            @endif
                
            @if (session()->has('error_message'))
            <div class="alert alert-danger  mt-lg" id="contactError">
                <strong>Lỗi!</strong> Tin nhắn chưa được gửi.
                <span class="font-size-xs mt-sm display-block" id="mailErrorMessage"></span>
            </div>
            @endif

            <h2 class="mb-sm mt-sm"><strong>Liên hệ</strong></h2>
            {!! Form::open(array('route' => 'front.send-contact', 'class' => 'post-cmt')) !!}
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Tên *</label>
                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="col-md-6">
                            <label>Email *</label>
                            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Tiêu đề</label>
                            <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Tin nhắn *</label>
                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="Gửi" class="btn btn-primary btn-lg mb-xlg" data-loading-text="Loading...">
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-6">

            <h4 class="heading-primary"><strong>Cửa hàng chính</strong></h4>
            <ul class="list list-icons list-icons-style-3 mt-xlg">
                <li><i class="fa fa-map-marker"></i> <strong>Địa chỉ:</strong> {{ Setting::config('address') }}</li>
                <li><i class="fa fa-phone"></i> <strong>Phone:</strong> {{ Setting::config('phone') }}</li>
                <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com"> {{ Setting::config('email') }}</a></li>
            </ul>

            <hr>

            <h4 class="heading-primary"><strong>Giờ mở cửa</strong></h4>
            <ul class="list list-icons list-dark mt-xlg">
                <li><i class="fa fa-clock-o"></i> Thứ 2 - Thứ 6 : 9am - 5pm</li>
                <li><i class="fa fa-clock-o"></i> Thứ 7 - Chủ Nhật: 9am - 2pm</li>
            </ul>

        </div>

    </div>

</div>
@endsection
