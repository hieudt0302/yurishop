@extends('layouts.admin') 
@section('title','Người Dùng - Admin') 
@section('content')
<section class="content-header">
    <h1 class="pull-left">
    	Người Dùng
        <small>Danh Sách</small>
    </h1>
    <div class="pull-right">
        <a href="{{('/admin/users/create')}}" class="btn bg-blue">
            <i class="fa fa-plus-square"></i>
            Thêm mới
        </a>
    </div>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title"></h3>Danh Sách Người Dùng
				</div>
				<div class="box-body">
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
								@if(!empty($user->roles)) @foreach($user->roles as $v)
								<label class="label label-success">{{ $v->display_name }}</label> @endforeach @endif
							</td>
							<td>
								@permission('user-show')
								<a class="btn btn-info" href="{{ route('admin.users.show',$user->id) }}">Xem</a> @endpermission @permission('user-edit')
								<a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}">Sửa</a> @endpermission
							</td>
							@else
							<td>{{ ++$i }}</td>
							<td>{{ $user->username }}</td>
							<td>{{ $user->email }}</td>
							<td>
								@if(!empty($user->roles)) @foreach($user->roles as $v)
								<label class="label label-success">{{ $v->display_name }}</label> @endforeach @endif
							</td>
							<td>
								<!-- <a class="btn btn-info" href="{{ route('admin.users.show',$user->id) }}">Xem</a> -->
								<a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}">Sửa</a>
								  {!! Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id],'style'=>'display:inline'])!!} 
								{!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!} {!! Form::close() !!} 
							</td>
							@endif
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection