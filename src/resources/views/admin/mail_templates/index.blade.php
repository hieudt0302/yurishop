@extends('layouts.admin')
@section('title','Mail Template - Admin') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh sách Mail Template
    </h1>
    
	<div class="pull-right">
        <a href="{{('/admin/mail_templates/create')}}" class="btn bg-blue">
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
                    <h3 class="box-title"></h3>Mail Template
                </div>
                <div class="box-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Tên</th>
								<th></th>
								<th></th>													
							</tr>
						</thead>
						<tbody>
							@foreach ($mailTemplates as $mailTemplate)
							<tr>
								<td>{{ $mailTemplate->name }}</td>
								<td>
									<a class="btn btn-primary btn-sm" href="{{ route('admin.mail_templates.edit',$mailTemplate->id) }}"><i class="fa fa-edit"></i></a> 
								</td>
								<td>
	                             	<!-- {!! Form::open(['method' => 'DELETE','route' => ['admin.mail_templates.destroy', $mailTemplate->id],'style'=>'display:inline']) !!}
                                    {{ Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit','class' => 'btn btn-warning btn-sm'] )  }}
                                    {!! Form::close() !!}    -->
									<a type="button" class="btn btn-danger" data-template-id="{{$mailTemplate->id}}" data-toggle="modal" data-target="#modal-delete-template">
                                        <i class="fa fa-ban"></i>
                                    </a> 
								</td>	
							</tr>
							@endforeach
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- QUESTION TO DELETE -->
<div class="modal modal-danger fade" id="modal-delete-template">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cảnh Báo</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa template này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                <form name="form-template-delete"  method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-outline" value="Xóa Template">
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
        $('#from_date, #to_date').datepicker({
            format : 'yyyy-mm-dd',
            autoclose : true,
            clearBtn : true
        })

        $('#modal-delete-template').on('show.bs.modal', function (e) {
            var templateID = $(e.relatedTarget).data('template-id');
            var action = "{{url('admin/mail_templates')}}/" + templateID;
            $(e.currentTarget).find('form[name="form-template-delete"]').attr("action", action);
        })  
    })
</script>
@endsection