@extends('layouts.admin') 
@section('title','Bình Luận Bài Viết - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Bình Luận Bài Viết
        <small>Danh Sách</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Bình Luận Bài Viết</a></li>
        <li class="active">Danh Sách</li>
    </ol>
    <div class="row">
        <div class="col-xs-12">
            @include('notifications.status_message') 
            @include('notifications.errors_message') 
        </div>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="form-horizontal">
        <div class="panel-group">
            <div class="panel panel-default panel-search">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{url('/admin/posts/comments')}}" method="POST">
                            {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="created_from" class="col-md-4 control-label">Từ Ngày</label>
                                    <div class="col-sm-8 input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="created_from" class="form-control pull-right" id="created_from" data-date-end-date="0d">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Đến Ngày</label>
                                    <div class="col-sm-8 input-group date">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="created_to" class="form-control pull-right" id="created_to" data-date-end-date="0d">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="SearchText" title="">Bình Luận</label>
                                    <div class="col-md-8">
                                        <input class="form-control text-box single-line" name="comment" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" >Đang Hiển Thị</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="approved_type">
                                            <option selected="selected" value="2">Tất Cả</option>
                                            <option value="1">Hiển Thị</option>
                                            <option value="0">Không Hiển Thị</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit"  class="btn btn-primary btn-search">
                                        <i class="fa fa-search"></i>
                                        Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="productreviews-grid">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Bài Viết</th>
                                    <th>Khách Hàng</th>
                                    <th>Bình Luận</th>
                                    <th style="text-align:center">Website</th>
                                    <th style="text-align:center">Hiển Thị</th>
                                    <th>Created on</th>
                                    <th style="text-align:center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                <tr>
                                <td><a href="{{url('/admin/posts/')}}/{{$comment->commentable_id}}/edit">{{$comment->post->title??'Bài viết đã được xóa.'}}</a></td>
                                    <td>{{$comment->name}}</td>
                                    <td>{{$comment->comment}}</td>
                                    <td style="text-align:center">{{$comment->website}}</td>
                                    <td style="text-align:center">
                                        @if($comment->approved===1)
                                        <i class="fa fa-check true-icon"></i>
                                        @else 
                                        <i class="fa fa-check false-icon"></i>
                                        @endif
                                    </td>
                                    <td>{{$comment->created_at}}</td>
                                    <td>
                                        <div class="tools">
                                            <a type="button" class="btn btn-danger" data-comment-id="{{$comment->id}}" data-toggle="modal" data-target="#modal-delete-comment">
                                                <i class="fa fa-ban"></i>
                                            </a> 
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                {{ $comments->links('vendor.pagination.admin') }}
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- QUESTION TO DELETE -->
<div class="modal modal-danger fade" id="modal-delete-comment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cảnh Báo</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa bình luận này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                <form name="form-comment-delete"  method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-outline" value="Xóa Bình Luận">
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
        $('#created_from, #created_to').datepicker({
            format : 'yyyy-mm-dd',
            autoclose : true,
            clearBtn : true
        })
        $('#modal-delete-comment').on('show.bs.modal', function (e) {
            var commentID = $(e.relatedTarget).data('comment-id');
            var action = "{{url('admin/posts/comments/')}}/" + commentID;
            $(e.currentTarget).find('form[name="form-comment-delete"]').attr("action", action);
        })  
    })
</script>
@endsection