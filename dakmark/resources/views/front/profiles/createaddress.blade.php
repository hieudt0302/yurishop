@extends('layouts.master') @section('content')
<div class="container">
	<br>
	<div class="row">
		<div class="col-md-3">
			<?php echo View::make('front.pages.profilesidebar') ?>
		</div>
		<div class="col-md-9">
			<div class="row">
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> Có một vài vấn đề với dữ liệu của bạn.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
			</div>
			<div class="row">
				{!! Form::open(array('route' => 'front.profiles.createaddress','method'=>'POST')) !!}
				<div class="form-group">
					<label>Tên (*)</label>
					{!! Form::text('first_name', null, array('placeholder' => 'Tên','class' => 'form-control')) !!}
				</div>
				<div class="form-group">
					<label>Họ (*)</label>
					{!! Form::text('last_name', null, array('placeholder' => 'Họ','class' => 'form-control')) !!}
				</div>
				<div class="form-group">
					<label>Điện Thoại</label>
					{!! Form::text('phone', null, array('placeholder' => 'Điện thoại','class' => 'form-control')) !!}
				</div>
				<div class="form-group">
					<label>Địa Chỉ (*)</label>
					{!! Form::text('address', null, array('placeholder' => 'Địa chỉ...','class' => 'form-control')) !!}
				</div>
				<div class="form-group">
					<label>Tỉnh/Thành Phố (*)</label>
					{!! Form::text('city', null, array('placeholder' => 'Tên Tỉnh hoặc Thành Phố','class' => 'form-control')) !!}
				</div>
				<div class="form-group">
					<label>Quận/Huyện/Thị xã (*)</label>
					{!! Form::text('district', null, array('placeholder' => 'Tên Quận, Huyện hoặc Thị xã','class' => 'form-control')) !!}
				</div>
				<button type="submit" class="btn btn-primary">Lưu</button> 
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection