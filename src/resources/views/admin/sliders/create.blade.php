@extends('layouts.admin')
@section('title','Slider - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      Slider
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/sliders')}}">Quay lại danh sách</a>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Slider</a></li>
        <li class="active">Thêm mới</li>
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
    <div class="row">
        <div class="col-md-12">
            <div class="form-horizontal">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#info" data-toggle="tab">Thông tin chung</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- INFO TAB -->
                        <div class="active tab-pane" id="info">
                            <form action="{{url('/admin/sliders/create')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field()}}
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Tiêu đề</label>
                                                <div class="col-md-4">
                                                    <input class="form-control" id="title" name="title" type="text" value="{{old('title')}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="url" title="">Url</label>
                                                <div class="col-md-4">
                                                    <input class="form-control text-box single-line valid"  id="url" name="url" type="text" value="{{old('url')}}">
                                                </div>
                                            </div>  
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="is_show" title="">Cho phép hiển thị</label>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('is_show', old('is_show') , true , array('class' => 'check-box')) }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="order" title="">Vị Trí</label>
                                                <div class="col-md-4">
                                                    <input class="form-control" id="order" name="order" type="text" value="{{old('order',0)}}">
                                                </div>
                                            </div>                                         
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Ảnh</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="img"/>
                                                    <span class="text-danger">{{ $errors->first('img') }}</span>                                                        
                                                </div>
                                            </div>                                             
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
@endsection


@section('scripts')
<script>
  $(function () {
    $('#title').on('change', function(e) {
        e.preventDefault();
        var token = '{{csrf_token()}}';
        var title =  $('#title').val();
        $.ajax({
            cache: false,
            url: '{{url("admin/sliders/generateslug")}}' + '/' + title,
            type: 'GET',
            data: { _token :token},
            success: function (response) {
                if (response['status'] =='success') {
                    $('#url').val(response['url'])
                }
            }
        });
        return false;
    });
  })
</script>
@endsection