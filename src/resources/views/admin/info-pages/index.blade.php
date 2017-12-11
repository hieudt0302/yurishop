@extends('layouts.admin')
@section('title','Trang thông tin - Admin') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="pull-left">
        Danh sách Trang Thông Tin
    </h1>
      <div class="pull-right">
        <a href="{{('/admin/info-pages/create')}}" class="btn bg-blue">
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
				@if ($message = Session::get('success'))
					<div class="alert alert-success">
						<p>{{ $message }}</p>
					</div>
				@endif 
                <div class="box-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Tiêu đề</th>
								<th>Slug</th>								
                                <th></th>
                                <th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($info_pages as $info_page)
							<tr>
								<td>{{ $info_page->title }}</td>
								<td>{{ $info_page->slug }}</td>
								<td style="width: 8%;">
									<a class="btn btn-primary btn-sm" href="{{ route('admin.info-pages.edit',$info_page->id) }}"><i class="fa fa-edit"></i></a> 
								</td>
								<td style="width: 8%;">
	                             	<!-- {!! Form::open(['method' => 'DELETE','route' => ['admin.info-pages.destroy', $info_page->id],'style'=>'display:inline']) !!}
                                    {{ Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit','class' => 'btn btn-warning btn-sm'] )  }}
                                    {!! Form::close() !!}    -->
									<a id="deleteBtn" type="button" class="btn btn-danger" data-id="{{$info_page->id}}" data-toggle="modal" data-target="#modal-delete-info-page">
                                    	<i class="fa fa-trash-o"></i> 
                                    </a> 
								</td>	
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>Tiêu đề</th>
								<th>Slug</th>									
                                <th></th>
                                <th></th>
							</tr>							
						</tfoot>	
					</table>
					{!! $info_pages->render() !!}
                </div>
            </div>
        </div>
    </div>
</section>

<!--/. Modal Form -->
<div class="modal modal-danger fade" id="modal-delete-info-page" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cảnh Báo</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa trang này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                <form name="form-info-page-delete"  method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="button" class="btn btn-outline" value="Xóa Trang">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Model Form ./-->
@endsection

@section('scripts')
<script>
	 $(function(){
		$("#deleteBtn").click(function(){
        	alert('fire');
    	});

		// $('#modal-delete-info-page').on('hide.bs.modal', function (e) {
        //     var infoPageId = $(e.relatedTarget).data('id');
        //     var action = "{{url('admin/info-pages')}}/" + infoPageId;
        //     $(e.currentTarget).find('form[name="form-info-page-delete"]').attr("action", action);
        // })
	});
</script>
@endsection