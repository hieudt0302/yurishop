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
</section>
<!-- Main content -->
<section class="content">
    <!-- PRODUCTS EDIT -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-horizontal">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#info" data-toggle="tab">Thông tin chung</a></li>
                        <li><a href="#content" data-toggle="tab">Nội dung</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- INFO TAB -->
                        <div class="active tab-pane" id="info">
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
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
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
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- CONTENT TAB -->
                        <div class="tab-pane" id="content">
                            <div class="panel-group">
                                <form action="{{url('/admin/posts')}}/{{$post->id}}/translation" method="post">
                                {!! method_field('patch') !!} 
                                {{ csrf_field()}}
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Ngôn ngữ</label>
                                                <div class="col-md-4">
                                                    <select id="language-select" name="language_id" class="form-control">
                                                        <option value="0">-----Chọn Ngôn Ngữ-----</option>                                                        
                                                        @foreach($languages as  $language)
                                                        <option value="{{$language->id}}">{{$language->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Tiêu đề</label>
                                                <div class="col-md-4">
                                                    <div class="input-group input-group-required">
                                                        <input class="form-control text-box single-line valid" id="title_translate" name="title_translate" type="text" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Lởi trích</label>
                                                <div class="col-md-8">
                                                    <textarea id="excerpt_translate" class="form-control" name="excerpt_translate" rows="3"  placeholder=""></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Nội dung</label>
                                                <div class="col-md-8">
                                                    <textarea id="content_translate" class="form-control ckeditor" name="content_translate" rows="3"  placeholder=""></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Mô tả</label>
                                                <div class="col-md-8">
                                                    <textarea id="description_translate" class="form-control" name="description_translate" rows="3"  placeholder=""></textarea>
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
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    // CKEDITOR.replace('excerpt-editor');
    // CKEDITOR.replace('content-editor');
    //bootstrap WYSIHTML5 - text editor
    // $('.textarea').wysihtml5()
    // TAB: CONTENT
    $('#language-select').on('change', function() {
        var code_id = this.value;
        $('#language_id_translate').val(code_id);
        $.ajax({
            type: "GET",
            url: '{{url("/admin/posts")}}/{{$post->id}}/'+ code_id +'/fetch',
            data:{
                '_token': '{{csrf_token()}}'
            },
            success:function(response){
            $('#title_translate').val(response['title']);
            $('#content_translate').val(response['content']);
            $('#description_translate').val(response['description']);
            $('#excerpt_translate').val(response['excerpt']);
            },
            error:function(response){
                alert('Không thể gửi yêu cầu về server');
            }
        });
    })    
  })
</script>
@endsection