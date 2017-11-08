@extends('layouts.admin')
@section('title','Mail Template - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Chỉnh sửa Mail Template
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/mail_templates')}}">Quay lại danh sách</a>
        </small>   
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Mail Template</a></li>
        <li class="active">Chỉnh sửa</li>
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
                        <li class="{{$tab==1?'active':''}}"><a href="#info" data-toggle="tab">Thông tin</a></li>
                        <li class="{{$tab==2?'active':''}}"><a href="#content" data-toggle="tab">Nội dung</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="{{$tab==1?'active':''}}  tab-pane" id="info">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Thông tin chung
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name" title="">Tên sản phẩm</label>
                                            <div class="col-md-4">
                                                <input class="form-control" id="name" name="name" type="text" value="{{ $mailTemplate->name }}">
                                            </div>
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
                        </div>
                        <div class="{{$tab==2?'active':''}} tab-pane" id="content">
                            <div class="panel-group">
                                <form id="getTranslation" action="{{url('/admin/mail_templates')}}/{{$mailTemplate->id}}/edit" method="GET">
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
                                <form action="{{url('/admin/mail_templates')}}/{{$mailTemplate->id}}/translation" method="post">
                                    {!! method_field('patch') !!} 
                                    {{ csrf_field()}}
                                    <input type="hidden" name="language_id" value="{{$language_id}}">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nội dung</label>
                                                <div class="col-md-8">
                                                    <textarea id="content_translate" class="form-control ckeditor" name="content_translate" rows="3"  placeholder="" contenteditable="true">{!! $translation->content??'' !!}</textarea>
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
</section>        
@endsection

@section('scripts')
<script>
  $(function () {
    // TAB: CONTENT
    $('#language-select').on('change', function() {
        $('form#getTranslation').submit();
        return false;
    })    
  })
</script>
@endsection