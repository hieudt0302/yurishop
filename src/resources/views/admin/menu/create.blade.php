@extends('layouts.admin')
@section('title','Menu - Admin')
@section('content')
<section class="content-header">
      <h1>
      Thêm Mới Menu
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/menu')}}">Quay lại danh sách</a>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Menu</a></li>
        <li class="active">Thêm Mới</li>
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
    <!-- PRODUCTS EDIT -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-horizontal">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#info" data-toggle="tab">Menu</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- INFO TAB -->
                        <div class="active tab-pane" id="info">
                            <form action="{{url('/admin/menu/create')}}" method="post">
                            {{ csrf_field()}}
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Thông Tin
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name" title="">Tên</label>                                                    
                                                <div class="col-md-4">
                                                    <input class="form-control" id="name" name="name" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="sku" title="">Thứ Tự</label>
                                                <div class="col-md-4">
                                                    <input class="form-control text-box single-line valid" 
                                                    name="order" type="text" value="0">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="slug" title="">Slug</label>
                                                <div class="col-md-4">
                                                    <input class="form-control"  id="slug" name="slug" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name" title="">Menu Chính</label>
                                                <div class="col-md-4">
                                                    <select  name="parent_id" class="form-control">
                                                        <option value="0">-----Không Chọn-----</option>
                                                        @foreach($menus as  $menu)
                                                        <option value="{{$menu->id}}">{{$menu->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Tùy Chọn
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('enabled', 1 , true, array('class' => 'check-box')) }}
                                                            Enable
                                                        </label>                                                
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('is_visible', 1 , true, array('class' => 'check-box')) }}
                                                            Hiển Thị
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                          
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Thêm Mới</button>
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
    $('#name').on('change', function(e) {
        e.preventDefault();
        var token = '{{csrf_token()}}';
        var name =  $('#name').val();
        $.ajax({
            cache: false,
            url: '{{url("admin/menu/generateslug")}}' + '/' + name,
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
  })
</script>
@endsection