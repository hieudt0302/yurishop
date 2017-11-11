@extends('layouts.admin')
@section('title','Trang thông tin - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Cập Nhật Trang Thông Tin
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/info-pages')}}">Quay lại danh sách</a>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Trang thông tin</a></li>
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
                            <form action="{{url('/admin/info-pages')}}/{{$info_page->id}}" method="post" enctype="multipart/form-data">
                            {!! method_field('patch') !!} 
                            {{ csrf_field()}}
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Tiêu đề</label>
                                                <div class="col-md-4">
                                                    <input class="form-control text-box single-line valid" id="title" name="title" type="text" value="{{$info_page->title}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Slug</label>
                                                <div class="col-md-4">
                                                    <input class="form-control text-box single-line valid"  id="slug" name="slug" type="text" value="{{$info_page->slug}}">
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
                                <form id="getTranslation" action="{{url('/admin/info-pages')}}/{{$info_page->id}}/edit" method="GET">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Ngôn ngữ</label>
                                                <div class="col-md-4">
                                                    <select id="language-select" name="language_id" class="form-control">
                                                        <option value="0">-----Chọn Ngôn Ngữ-----</option>                                                        
                                                        @foreach($languages as  $language)
                                                            @if($language_id == $language->id )
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

                                <form action="{{url('/admin/info-pages')}}/{{$info_page->id}}/translation" method="post">
                                {!! method_field('patch') !!} 
                                {{ csrf_field()}}
                                <input type="hidden" name="language_id" value="{{$language_id}}">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Tiêu đề</label>
                                                <div class="col-md-4">
                                                    <div class="input-group input-group-required">
                                                        <input class="form-control text-box single-line valid" id="title_translate" name="title_translate" type="text" value="{{$translation->title??''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Mô tả</label>
                                                <div class="col-md-8">
                                                    <textarea id="description_translate" class="form-control" name="description_translate" rows="3"  placeholder="">{{$translation->description??''}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Nội dung</label>
                                                <div class="col-md-8">
                                                    <textarea id="content_translate" class="form-control" name="content_translate" rows="3"  placeholder="" contenteditable="true">{!! $translation->content??'' !!}</textarea>
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
<script src="{{asset('backend/dist/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('backend/dist/ckfinder/ckfinder.js')}}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'content_translate',
    {
        filebrowserBrowseUrl : '/backend/dist/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : '/backend/dist/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl : '/backend/dist/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl : '/backend/dist/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : '/backend/dist/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : '/backend/dist/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
</script>
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
                url: '{{url("admin/posts/generateslug")}}' + '/' + title,
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