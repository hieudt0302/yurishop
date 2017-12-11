@extends('layouts.admin') @section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Quản Lý Tỷ Giá</h2>
		</div>
		<!-- <div class="pull-right">
			@permission('rate-create')
			<a class="btn btn-success" href="{{ route('admin.rates.create') }}"> Thêm Mới</a> @endpermission
		</div> -->
	</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
<div class="row">
	<div class="col-xs-6 col-sm-4"></div>
	<div class=".col-xs-6 .col-sm-4">
		{!! Form::open(array('route' => 'admin.rates.store','method'=>'POST', 'class'=>'form-inline')) !!}
		<div class="form-group">
			<label for="rate">Tỷ Giá Mới</label> 
			{!! Form::text('rate', null, array('placeholder' => '0.00','class' =>'form-control')) !!}
		</div>
		<button type="submit" class="btn btn-primary">Cập Nhật</button> 
		{!! Form::close() !!}
	</div>
	<div class="col-xs-6 col-sm-4"></div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<div class="pull-left">
			<h4>Lịch Sử Thay Đổi</h4>
		</div>
	</div>

</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<tr>
				<th>#</th>
				<th>Ngày Cập Nhật</th>
				<th>Tỷ Giá</th>
				<th>Người Cập Nhật</th>
			</tr>
			@foreach ($rates as $key => $rate)
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $rate->updated_at }}</td>
				<td>{{ $rate->rate }}</td>
				<td>
					  @if(!empty($rate->user))
						{{ $rate->user->username }}
					@endif  
				</td>
			</tr>
			@endforeach
		</table>
	</div>

</div>

{!! $rates->render() !!} 
@endsection
