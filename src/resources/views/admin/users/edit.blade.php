@extends('layouts.admin')
@section('title','Thêm Mới Người Dùng - Admin') 
@section('content')
<section class="content-header">
<h1>
Thêm Mới Người Dùng
  <small>
      <i class="fa fa-arrow-circle-left"></i>
      <a href="{{url('/admin/users')}}">Quay lại danh sách</a>
  </small>
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li><a href="#">Người Dùng</a></li>
  <li class="active">Thêm Mới</li>
</ol>
<div class="row">
  <div class="col-xs-12">
  @include('notifications.status_message') 
  @include('notifications.errors_message') 
  </div>
</div>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title"></h3>Danh Sách Người Dùng
				</div>
				<div class="box-body">
	        {!! Form::model($user, ['method' => 'PATCH','route' => ['admin.users.update', $user->id]]) !!}
                    <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>User Name:</strong>
                                {!! Form::text('username', null, array('readonly', 'placeholder' => 'User Name','class' => 'form-control')) !!}
                            </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tên:</strong>
                            {!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Họ</strong>
                            {!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Điện Thoại:</strong>
                            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
                        </div>
                    </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                {!! Form::text('email', null, array( 'readonly','placeholder' => 'Email','class' => 'form-control')) !!}
                            </div>
                        </div>
                    
                
                
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Mật Khẩu:</strong>
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Xác Nhận Lại Mật Khẩu:</strong>
                            {!! Form::password('confirm_password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Quyền Hạn:</strong>
                            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="activated" value="0">
                            <label>{{ Form::checkbox('activated', 1 , $user->activated ? true : false, array('class' => 'name')) }}
                            Kích Hoạt</label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </div>
                    {!! Form::close() !!}
                </div>
			</div>
		</div>
    </div>
</section>
@endsection