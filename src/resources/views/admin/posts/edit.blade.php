@extends('layouts.admin')
@section('title','Post - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      Bài viết
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/posts')}}">Quay lại danh sách</a>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Bài viết</a></li>
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
    <!-- PRODUCTS EDIT -->
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
                            <form action="{{url('/admin/posts')}}/{{$post->id}}" method="post" enctype="multipart/form-data">
                            {!! method_field('patch') !!} 
                            {{ csrf_field()}}
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Tiêu đề</label>
                                                <div class="col-md-4">
                                                    <div class="input-group input-group-required">
                                                        <input class="form-control text-box single-line valid" id="title" name="title" type="text" value="{{$post->title}}">
                                                        <div class="input-group-btn">
                                                            <span class="required">*</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                        
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Xuất bản</label>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('published', 1 , $post->published ? true : false, array('class' => 'check-box')) }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Slug</label>
                                                <div class="col-md-4">
                                                    <input class="form-control text-box single-line valid"  id="slug" name="slug" type="text" value="{{$post->slug}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Danh mục</label>
                                                <div class="col-md-4">
                                                    <select name="category_id" class="form-control">
                                                        @foreach($categories as  $category)
                                                        <option value="{{$category->id}}" {{$post->category->id == $category->id?'selected':''}}>{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tags" class="col-md-3 control-label">Tags</label>
                                                <div class="col-md-4">
                                                    <select id="tags" multiple name="tagIds[]" class="form-control select2" style="width: 100%;">
                                                        <!-- Tags  -->
                                                        @foreach($tags as $key =>$tag)
                                                            @php($selected = false)
                                                            @foreach($post->tags as $t)
                                                                @if($t->id == $tag->id)
                                                                    @php($selected = true)
                                                                @endif
                                                            @endforeach
                                                            <option value="{{$tag->id}}" {{$selected?'selected':''}}>{{$tag->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>   
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Ảnh đại diện</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="img"/>
                                                    <span class="text-danger">{{ $errors->first('img') }}</span>                                                        
                                                </div>
                                            </div>  
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div style="height: 200px; border: 1px solid whitesmoke;text-align: center">
                                                        @if(strlen($post->img) > 0)
                                                            <img width="100%" height="100%" src="{{asset('storage')}}/{{$post->img}}"/>
                                                        @else 
                                                            <img width="100%" height="100%" src="{{asset('images/no-image.png')}}"/>
                                                        @endif                                                        
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
                                <form id="getTranslation" action="{{url('/admin/posts')}}/{{$post->id}}/edit" method="GET">
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

                                <form action="{{url('/admin/posts')}}/{{$post->id}}/translation" method="post">
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
                                                <label class="control-label col-md-3" for="title" title="">Đoạn trích</label>
                                                <div class="col-md-8">
                                                    <textarea id="excerpt_translate" class="form-control" name="excerpt_translate" rows="3"  placeholder="">{{$translation->excerpt??''}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Nội dung</label>
                                                <div class="col-md-8">
                                                    <textarea id="content_translate" class="form-control ckeditor" name="content_translate" rows="3"  placeholder="" contenteditable="true">{!! $translation->content??'' !!}</textarea>
                                                </div>
                                            </div>
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
<script>
  $(function () {
    $('#special_price_start_date, #special_price_end_date').datepicker({
        format : 'yyyy-mm-dd',
        autoclose : true,
        clearBtn : true
    })
   

    $('#special_price_start_date').datepicker().on('changeDate', function(e) {
       
    });

    $('#special_price_end_date').datepicker().on('changeDate', function(e) {
      
    });

    $('.select2').select2();
    $('#tags').select2({
        tags: true,
        tokenSeparators: [',']
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
  })
</script>
@endsection