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
        <li class="active">Cập Nhật</li>
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
                        <li class="{{$tab==1?'active':''}}"><a href="#info" data-toggle="tab">Thông tin chung</a></li>
                        <li class="{{$tab==2?'active':''}}"><a href="#content" data-toggle="tab">Nội dung</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- INFO TAB -->
                        <div class="{{$tab==1?'active':''}} tab-pane" id="info">
                            <form action="{{url('/admin/sliders')}}/{{$slider->id}}" method="post" enctype="multipart/form-data">
                            {!! method_field('patch') !!} 
                            {{ csrf_field()}}
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Tiêu đề</label>
                                                <div class="col-md-4">
                                                    <input class="form-control" id="title" name="title" type="text" value="{{$slider->title}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="url" title="">Url</label>
                                                <div class="col-md-4">
                                                    <input class="form-control text-box single-line valid"  id="url" name="url" type="text" value="{{$slider->url}}">
                                                </div>
                                            </div>  
                                            <div class="form-group">
                                            <label class="control-label col-md-3" for="title" title="">Hiển Thị</label>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('is_show', 1 , $slider->is_show ? 1 : 0, array('class' => 'check-box')) }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="order" title="">Vị Trí</label>
                                                <div class="col-md-4">
                                                    <input class="form-control" id="order" name="order" type="text" value="{{$slider->order}}">
                                                </div>
                                            </div>                                         
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="img" title="">Ảnh</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="img"/>
                                                    <span class="text-danger">{{ $errors->first('img') }}</span>                                                        
                                                </div>
                                            </div>     
                                            <div class="form-group">   
                                            <!-- TODO: SHOW IMAGE HERE   -->
                                            </div>                                        
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- CONTENT TAB -->
                        <div class="{{$tab==2?'active':''}} tab-pane" id="content">
                            <div class="panel-group">
                                <form id="getTranslation" action="{{url('/admin/sliders')}}/{{$slider->id}}/edit" method="GET">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Ngôn ngữ</label>
                                                <div class="col-md-4">
                                                    <select id="language-select" name="language_id" class="form-control">
                                                        <option value="0">-----Chọn Ngôn Ngữ-----</option>                                                        
                                                        @foreach($languages as  $language)
                                                            @if( $language_id == $language->id )
                                                                <option value="{{$language->id}}" selected>{{$language->name}}</option>
                                                            @else
                                                                <option value="{{$language->id}}" >{{$language->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <form action="{{url('/admin/sliders')}}/{{$slider->id}}/translation" method="post">
                                {!! method_field('patch') !!} 
                                {{ csrf_field()}}
                                <input type="hidden" name="language_id" value="{{$language_id}}">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Mô tả</label>
                                                <div class="col-md-8">
                                                    <textarea id="description_translate" class="form-control" name="description_translate" rows="3"  placeholder="">{{$translation->description??''}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Lưu</button>
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
    </div>  
@endsection


@section('scripts')
<script>
  $(function () {
      // TAB: CONTENT
    $('#language-select').on('change', function() {
        $('form#getTranslation').submit();
        return false;
    })    

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