@extends('layouts.admin')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Quản Lý FAQ</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-success" href="{{ route('admin.faqs.create') }}"> Tạo Mới</a>
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>#</th>
			<th>Id</th>
			<th>Câu hỏi</th>
			<th width="280px">Thao Tác</th>
		</tr>
	@foreach ($faqs as $faq)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $faq->faq_id }}</td>
		<td>{{ $faq->question }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('admin.faqs.show',$faq->faq_id) }}">Xem</a>
			<a class="btn btn-primary" href="{{ route('admin.faqs.edit',$faq->faq_id) }}">Sửa</a>
			{!! Form::open(['method' => 'DELETE','route' => ['admin.faqs.destroy', $faq->faq_id],'style'=>'display:inline']) !!}
			{!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
    		{!! Form::close() !!}
		</td>

	</tr>
	@endforeach
	</table>
	{!! $faqs->render() !!}
@endsection