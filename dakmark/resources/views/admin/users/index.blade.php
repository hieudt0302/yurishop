@extends('layouts.admin')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Quản Lý Người Dùng</h2>
	        </div>
	        <div class="pull-right">
				@permission('user-create')
	            <a class="btn btn-success" href="{{ route('admin.users.create') }}"> Tạo Mới</a>
				@endpermission
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
			<th>Tài Khoản</th>
			<th>Email</th>
			<th>Quyền</th>
			<th width="280px">Thao Tác</th>
		</tr>
	@foreach ($data as $key => $user)
	<tr>
		@if(Auth::user()->id===$user->id)
			<td>{{ ++$i }}</td>
			<td>{{ $user->username }}</td>
			<td>{{ $user->email }}</td>
			<td>
				@if(!empty($user->roles))
					@foreach($user->roles as $v)
						<label class="label label-success">{{ $v->display_name }}</label>
					@endforeach
				@endif
			</td>
			<td>
		 		@permission('user-show')
				<a class="btn btn-info" href="{{ route('admin.users.show',$user->id) }}">Xem</a>
				@endpermission
			
				@permission('user-edit')
				<a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}">Sửa</a>
				@endpermission
			</td>
		@else
			<td>{{ ++$i }}</td>
			<td>{{ $user->username }}</td>
			<td>{{ $user->email }}</td>
			<td>
				@if(!empty($user->roles))
					@foreach($user->roles as $v)
						<label class="label label-success">{{ $v->display_name }}</label>
					@endforeach
				@endif
			</td>
			<td>
		 		@permission('user-show')
				<a class="btn btn-info" href="{{ route('admin.users.show',$user->id) }}">Xem</a>
				@endpermission
			
				@permission('user-edit')
				<a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}">Sửa</a>
				@endpermission

            	@permission('user-delete')
				{!! Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id],'style'=>'display:inline']) !!}
				{!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
        		{!! Form::close() !!}
				@endpermission 
			</td>
		@endif
	</tr>
	@endforeach
	</table>
	{!! $data->render() !!}
@endsection