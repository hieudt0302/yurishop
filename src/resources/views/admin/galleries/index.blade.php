@extends('layouts.admin') 
@section('title','Galleries - Admin')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Galleries
        <small>Danh Sách</small>
    </h1>
    <div class="pull-right">
        <a href="{{('/admin/galleries/create')}}" class="btn bg-blue">
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
                    <h3 class="box-title"></h3>Danh Sách Gallery
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>#</th>
                                <th>Tên</th>
                                <th>Slug</th>
                                <th>Xuất Bản</th>
                                <th>Ngày Tạo</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galleries as $key => $gallery)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$gallery->name}}</td>
                                <td>{{$gallery->slug}}</td>
                                <td>
                                    @if($gallery->published==1) Đã xuất bản @else Chưa xuất bản @endif
                                </td>
                                <td>{{$gallery->created_at}}</td>
                                <td>
                                  <div class="tools">
                                   <a class="btn btn-primary btn-sm" href="{{url('/')}}/admin/galleries/{{$gallery->id}}/edit"> <i class="fa fa-edit"></i></a>
                                  </div>
                                </td>
                                <td>
                                  <div class="tools">
                                    <a type="button" class="btn btn-danger" data-gallery-id="{{$gallery->id}}" data-toggle="modal" data-target="#modal-delete-gallery">
                                        <i class="fa fa-ban"></i>
                                    </a> 
                                  </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Slug</th>
                                <th>Xuất Bản</th>
                                <th>Ngày Tạo</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    {{ $galleries->links('vendor.pagination.admin') }}
                </div>
            </div>
        </div>
    </div>
</section>


<!-- QUESTION TO DELETE -->
<div class="modal modal-danger fade" id="modal-delete-gallery">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cảnh Báo</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa gallery này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                <form name="form-gallery-delete"  method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-outline" value="Xóa Gallery">
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

        $('#modal-delete-gallery').on('show.bs.modal', function (e) {
            var galleryID = $(e.relatedTarget).data('gallery-id');
            var action = "{{url('admin/galleries')}}/" + galleryID;
            $(e.currentTarget).find('form[name="form-gallery-delete"]').attr("action", action);
        })  
    })
</script>
@endsection