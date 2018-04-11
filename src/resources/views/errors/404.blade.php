@extends('layouts.master')
@section('title','Yurishop - 404')
@section('content')

<section class="page-header mb-lg">

    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>

            <li class="active">Page not found</li>
        </ul>
    </div>
</section>

<div class="container">

	<section class="page-not-found">
		<div class="row">
			<div class="col-md-6 col-md-offset-1">
				<div class="page-not-found-main">
					<h2>404 <i class="fa fa-file"></i></h2>
					<p>Chúng tôi thành thật xin lỗi, trang bạn đang tìm không tồn tại hoặc phát sinh lỗi.</p>
				</div>
			</div>
			<div class="col-md-4">
				<h4 class="heading-primary">Bạn có thể ghé qua</h4>
				<ul class="nav nav-list">
					<li><a href="{{ url('/')}}">Trang chủ</a></li>
					<li><a href="{{ url('/about-us')}}">Về chúng tôi</a></li>
					<li><a href="{{ url('/faqs')}}">Câu hỏi thường gặp</a></li>
					<li><a href="{{ url('/contact')}}">Liên hệ</a></li>
				</ul>
			</div>
		</div>
	</section>

</div>
@endsection