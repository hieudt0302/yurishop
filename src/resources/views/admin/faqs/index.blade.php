@extends('layouts.admin')
@section('title','FAQ - Admin') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="pull-left">
        Danh sách FAQ
    </h1>
      <div class="pull-right">
        <a href="{{('/admin/faqs/create')}}" class="btn bg-blue">
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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>						
							<tr>
								<th>Câu hỏi</th>
                                <th>Hiển thị</th>                                
                                <th></th>
                                <th></th>
							</tr>
						</thead>
                        <tbody>						
							@foreach ($faqs as $faq)
							<tr>
								<td>{{ $faq->question }}</td>
                                <td>
                                    <i class="fa {!! ($faq->is_show==1) ? 'fa-check' : 'fa-times' !!}"></i>
                                </td>								
                                <td>
									<a class="btn btn-primary btn-sm" href="{{ route('admin.faqs.edit',$faq->id) }}"><i class="fa fa-edit"></i></a> 
								</td>
                                <td style="width: 8%;">
                                    <a id="deleteBtn" type="button" class="btn btn-danger" data-faq-id="{{$faq->id}}" data-toggle="modal" data-target="#modal-delete-faq">
                                        <i class="fa fa-trash-o"></i> 
                                    </a> 
                                </td>   							

							</tr>
							@endforeach
						</tbody>
                        <tfoot>
							<tr>
								<th>Câu hỏi</th>
                                <th>Hiển thị</th>                                
                                <th></th>
                                <th></th>
							</tr>                        	
                        </tfoot>						
					</table>
					{!! $faqs->render() !!}					
                </div>
            </div>
        </div>
    </div>
</section>

<!--/. Modal Form -->
<div class="modal modal-danger fade" id="modal-delete-faq" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cảnh Báo</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa FAQ này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                <form name="form-faq-delete"  method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-outline" value="Xóa FAQ">
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

        $('#modal-delete-faq').on('show.bs.modal', function (e) {
            var faqId = $(e.relatedTarget).data('faq-id');
            var action = "{{url('admin/faqs')}}/" + faqId;
            $(e.currentTarget).find('form[name="form-faq-delete"]').attr("action", action);
        })
    });
</script>
@endsection