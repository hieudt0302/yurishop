@extends('layouts.admin')
@section('title','Banner - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      Banner / Icon
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Banner / Icon</a></li>
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
                        <li class="active"><a href="#info" data-toggle="tab">Thay đổi ảnh banner / icon</a></li>
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
                                                <label class="control-label col-md-3" for="slug" title="">Banner Homepage bên trái 1</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="banner-left-1"/>
                                                    <span class="text-danger">{{ $errors->first('banner-left-1') }}</span>                                                        
                                                </div>
                                            </div>
                                           <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Banner Homepage bên trái 2</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="banner-left-2"/>
                                                    <span class="text-danger">{{ $errors->first('banner-left-2') }}</span>                                                        
                                                </div>
                                            </div>
                                           <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Banner Homepage bên trái 3</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="banner-left-3"/>
                                                    <span class="text-danger">{{ $errors->first('banner-left-3') }}</span>                                                        
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Banner Homepage ở giữa 1</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="banner-middle-1"/>
                                                    <span class="text-danger">{{ $errors->first('banner-middle-1') }}</span>                                                        
                                                </div>
                                            </div>
                                           <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Banner Homepage ở giữa 2</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="banner-middle-2"/>
                                                    <span class="text-danger">{{ $errors->first('banner-middle-2') }}</span>                                                        
                                                </div>
                                            </div>
                                           <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Banner Homepage ở giữa 3</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="banner-middle-3"/>
                                                    <span class="text-danger">{{ $errors->first('banner-middle-3') }}</span>                                                        
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Banner Homepage bên phải 1</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="banner-right-1"/>
                                                    <span class="text-danger">{{ $errors->first('banner-right-1') }}</span>                                                        
                                                </div>
                                            </div>
                                           <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Banner Homepage bên phải 2</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="banner-right-2"/>
                                                    <span class="text-danger">{{ $errors->first('banner-right-2') }}</span>                                                        
                                                </div>
                                            </div>
                                           <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Banner Homepage bên phải 3</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="banner-right-3"/>
                                                    <span class="text-danger">{{ $errors->first('banner-right-3') }}</span>                                                        
                                                </div>
                                            </div>

                                            <hr>
                                                                                                                                    
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Banner quảng cáo 1</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="banner-ads-1"/>
                                                    <span class="text-danger">{{ $errors->first('banner-ads-1') }}</span>                                                        
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Banner quảng cáo 2</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="banner-ads-2"/>
                                                    <span class="text-danger">{{ $errors->first('banner-ads-2') }}</span>                                                        
                                                </div>
                                            </div>
                                           
                                            <hr>

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
