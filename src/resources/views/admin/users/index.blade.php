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
	<div class="row">
        <div class="col-xs-12">
            @include('notifications.status_message') 
            @include('notifications.errors_message') 
        </div>
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
							@if(Auth::user()->id == $user->id)
							<td>{{ ++$i }}</td>
							<td>{{ $user->username }}</td>
							<td>{{ $user->email }}</td>
							<td>
								@if(!empty($user->roles)) @foreach($user->roles as $v)
								<label class="label label-success">{{ $v->display_name }}</label> @endforeach @endif
							</td>
							<td>
								
								<a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}">Sửa</a>
					
							</td>
							@else
							<td>{{ ++$i }}</td>
							<td>{{ $user->username }}</td>
							<td>{{ $user->email }}</td>
							<td>
								@if(!empty($user->roles)) @foreach($user->roles as $v)
								<label class="label label-success">{{ $v->display_name }}</label> 
								@endforeach @endif
							</td>
							<td>
								@role('admin')
								<a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}">Sửa</a>
								<a type="button" class="btn btn-danger" data-user-id="{{$user->id}}" data-toggle="modal" data-target="#modal-delete-user">
                                    <i class="fa fa-ban"></i>
                                </a> 
								@endrole
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
<!-- QUESTION TO DELETE -->
<div class="modal modal-danger fade" id="modal-delete-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cảnh Báo</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa người dùng này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                <form name="form-user-delete"  method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-outline" value="Xóa Người Dùng">
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@section('scripts')
<script>
    $(function(){
      
        $('#modal-delete-user').on('show.bs.modal', function (e) {
            var userID = $(e.relatedTarget).data('user-id');
            var action = "{{url('admin/users')}}/" + userID;
            $(e.currentTarget).find('form[name="form-user-delete"]').attr("action", action);
        })  
    })
</script>
@endsection