@extends('layouts.admin') 
@section('title','Bài Viết - Admin')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bài viết
        <small>Danh Sách</small>
    </h1>
    <div class="pull-right">
        <a href="{{('/admin/posts/create')}}" class="btn bg-blue">
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
<!-- SEARCH -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">Tìm kiếm</h3>
                </div>
                <form action="{{url('admin/posts')}}" method="POST" class="form-horizontal" >
                {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="product_name" class="col-sm-2 control-label">Tiêu Đề</label>
                            <div class="col-sm-4">
                                <input type="text" name="post_title" class="form-control" id="post_title" value="{{old('post_title')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="col-sm-2 control-label">Chủ Đề</label>
                            <div class="col-sm-4">
                                <select name="category_id" class="form-control select2" style="width: 100%;">
                                    <option value="0" >-----Tất cả-----</option>
                                    @foreach($categories as $category)
                                       <option value="{{$category->id}}" {{ old('category_id') == $category->id? 'selected':''}}>{{$category->name}}</option>
                                    @endforeach
                             </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-search"></i> Tìm kiếm
                        </button>
                        <!-- <button type="submit" class="btn btn-default pull-right">
                            <i class="fa fa-print"></i> Xuất file
                        </button> -->
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>Danh Sách Bài Viết
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>#</th>
                                <th>Tiêu Đề</th>
                                <th>Slug</th>
                                <th>Xuất Bản</th>
                                <th>Ngày Tạo</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $key => $post)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->slug}}</td>
                                <td>
                                    @if($post->published==1) Đã xuất bản @else Chưa xuất bản @endif
                                </td>
                                <td>{{$post->created_at}}</td>
                                <td>
                                  <div class="tools">
                                   <a class="btn btn-primary btn-sm" href="{{url('/')}}/admin/posts/{{$post->id}}/edit"> <i class="fa fa-edit"></i></a>
                                  </div>
                                </td>
                                <td>
                                  <div class="tools">
                                    <a type="button" class="btn btn-danger" data-post-id="{{$post->id}}" data-toggle="modal" data-target="#modal-delete-post">
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
                                <th>Tiêu Đề</th>
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
                    {{ $posts->links('vendor.pagination.admin') }}
                </div>
            </div>
        </div>
    </div>
</section>


<!-- QUESTION TO DELETE -->
<div class="modal modal-danger fade" id="modal-delete-post">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cảnh Báo</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa bài viết này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                <form name="form-post-delete"  method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-outline" value="Xóa Bài Viết">
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

        $('#modal-delete-post').on('show.bs.modal', function (e) {
            var postID = $(e.relatedTarget).data('post-id');
            var action = "{{url('admin/posts')}}/" + postID;
            $(e.currentTarget).find('form[name="form-post-delete"]').attr("action", action);
        })  
    })
</script>
@endsection