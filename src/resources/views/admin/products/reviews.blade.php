@extends('layouts.admin') 
@section('title','Đánh Giá Sản Phẩm - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Đánh Giá Sản Phẩm
        <small>Danh Sách</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Đánh Giá Sản Phẩm</a></li>
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
                            <form action="{{url('/admin/products/reviews')}}" method="POST">
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
                                    <label class="col-md-4 control-label" for="SearchText" title="">Review</label>
                                    <div class="col-md-8">
                                        <input class="form-control text-box single-line" name="review" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" >Approved</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="approved_type">
                                            <option selected="selected" value="2">All</option>
                                            <option value="1">Approved only</option>
                                            <option value="0">Disapproved only</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="col-md-4 control-label" >Product Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="product_name">
                                    </div>
                                </div> -->
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
                                    <th>Sản Phẩm</th>
                                    <th>Khách Hàng</th>
                                    <th>Review</th>
                                    <th style="text-align:center">Sao</th>
                                    <th style="text-align:center">Hiển Thị</th>
                                    <th>Ngày Tạo</th>
                                    <th style="text-align:center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reviews as $review)
                                <tr>
                                    <td><a href="{{url('/admin/products/')}}/{{$review->commentable_id}}/edit">{{$review->product->name??'Sản phẩm đã xóa.'}}</a></td>
                                    <td>{{$review->name}}</td>
                                    <td>{{$review->comment}}</td>
                                    <td style="text-align:center">{{$review->rate}}</td>
                                    <td style="text-align:center">
                                        @if($review->approved===1)
                                        <i class="fa fa-check true-icon"></i>
                                        @else 
                                        <i class="fa fa-times false-icon"></i>
                                        @endif
                                    </td>
                                    <td>{{$review->created_at}}</td>
                                    <!-- <td>
                                        <div class="tools">
                                            <a class="btn btn-primary btn-sm" href="{{url('/admin/products/reviews')}}/{{$review->id}}/edit"> <i class="fa fa-edit"></i></a>
                                        </div>
                                    </td> -->
                                    <td>
                                        <div class="tools">
                                            <a type="button" class="btn btn-danger" data-review-id="{{$review->id}}" data-toggle="modal" data-target="#modal-delete-review">
                                                <i class="fa fa-ban"></i>
                                            </a> 
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                {{ $reviews->links('vendor.pagination.admin') }}
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- QUESTION TO DELETE -->
<div class="modal modal-danger fade" id="modal-delete-review">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cảnh Báo</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa đánh giá này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                <form name="form-review-delete"  method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-outline" value="Xóa Đánh Giá">
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
        $('#modal-delete-review').on('show.bs.modal', function (e) {
            var reviewID = $(e.relatedTarget).data('review-id');
            var action = "{{url('admin/products/reviews/')}}/" + reviewID;
            $(e.currentTarget).find('form[name="form-review-delete"]').attr("action", action);
        })  
    })
</script>
@endsection