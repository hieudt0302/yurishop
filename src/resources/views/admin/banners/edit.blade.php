@extends('layouts.admin')
@section('title','Banner - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      Banner
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Banner</a></li>
        <li class="active">Cập nhật</li>
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
                        <li class="active"><a href="#info" data-toggle="tab">Thay đổi ảnh banner</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- INFO TAB -->
                        <div class="active tab-pane" id="info">
                            <form action="{{url('/admin/banners/update')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field()}}
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-body">


                                       
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Banner rộng toàn màn hình</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="banner-full"/>
                                                    <span class="text-danger">{{ $errors->first('banner-full') }}</span>                                                        
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Banner bên trái</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="banner-left"/>
                                                    <span class="text-danger">{{ $errors->first('banner-left') }}</span>                                                        
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Banner bên phải</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="banner-right"/>
                                                    <span class="text-danger">{{ $errors->first('banner-right') }}</span>                                                        
                                                </div>
                                            </div>                                                                                                                                      
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
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
