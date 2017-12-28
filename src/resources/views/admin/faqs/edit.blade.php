@extends('layouts.admin')
@section('title','FAQ - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      FAQ
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/faqs')}}">Quay lại danh sách</a>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">FAQ</a></li>
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
                        <li class="{{$tab==1?'active':''}}"><a href="#info" data-toggle="tab">Thông tin chung</a></li>
                        <li class="{{$tab==2?'active':''}}"><a href="#content" data-toggle="tab">Nội dung</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- INFO TAB -->
                        <div class="{{$tab==1?'active':''}} tab-pane" id="info">
                            <form action="{{url('/admin/faqs')}}/{{$faq->id}}" method="post" enctype="multipart/form-data">
                                {!! method_field('patch') !!} 
                                {{ csrf_field()}}
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Câu Hỏi</label>
                                                <div class="col-md-4">
                                                    <input class="form-control" id="question" name="question" type="text" value="{{$faq->question}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="is_show" title="">Hiển thị</label>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('is_show', 1 , $faq->is_show ? true : false , array('class' => 'check-box')) }}
                                                        </label>
                                                    </div>
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
                            </form>
                        </div>
                         <!-- CONTENT TAB -->
                         <div class="{{$tab==2?'active':''}} tab-pane" id="content">
                            <div class="panel-group">
                                <form id="getTranslation" action="{{url('/admin/faqs')}}/{{$faq->id}}/edit" method="GET">
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

                                <form action="{{url('/admin/faqs')}}/{{$faq->id}}/translation" method="post">
                                {!! method_field('patch') !!} 
                                {{ csrf_field()}}
                                <input type="hidden" name="language_id" value="{{$language_id}}">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Câu Hỏi</label>
                                                <div class="col-md-8">
                                                    <textarea id="question_translate" class="form-control" name="question_translate" rows="3"  placeholder="">{{$translation->question??''}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Câu Trả Lời</label>
                                                <div class="col-md-8">
                                                    <textarea id="answer_translate" class="form-control" name="answer_translate" rows="3"  placeholder="">{{$translation->answer??''}}</textarea>
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
    $('#language-select').on('change', function() {
        $('form#getTranslation').submit();
        return false;
    })    
  })
</script>
@endsection