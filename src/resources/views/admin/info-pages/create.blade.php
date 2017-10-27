@extends('layouts.admin')
@section('title','Trang thông tin - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Thêm mới Trang Thông Tin
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/info-pages')}}">Quay lại danh sách</a>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Trang thông tin</a></li>
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
                            <form action="{{url('/admin/info-pages/create')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field()}}
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Tiêu đề</label>
                                                <div class="col-md-4">
                                                    <input class="form-control text-box single-line valid" id="title" name="title" type="text" value="{{old('title')}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Slug</label>
                                                <div class="col-md-4">
                                                    <input class="form-control text-box single-line valid"  id="slug" name="slug" type="text" value="{{old('slug')}}">
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
</section>        

@endsection
@section('scripts')    
<script type="text/javascript">
     $(function () {
        $('#title').on('change', function(e) {
            e.preventDefault();
            var token = '{{csrf_token()}}';
            var title =  $('#title').val();
            $.ajax({
                cache: false,
                url: '{{url("admin/info-pages/generateslug")}}' + '/' + title,
                type: 'GET',
                data: { _token :token},
                success: function (response) {
                    if (response['status'] =='success') {
                        $('#slug').val(response['slug'])
                    }
                }
            });
            return false;
        });
    });  
</script>   
  
@endsection