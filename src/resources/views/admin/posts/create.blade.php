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
                            <form action="{{url('/admin/posts/create')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field()}}
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="title" title="">Tiêu đề</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <input class="form-control text-box single-line valid" id="title" name="title" type="text" value="{{old('title')}}">
                                                        <div class="input-group-btn">
                                                            <span class="required">*</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="Published" title="">Xuất bản</label>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('published', old('published') , true , array('class' => 'check-box')) }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Slug</label>
                                                <div class="col-md-4">
                                                    <input class="form-control text-box single-line valid"  id="slug" name="slug" type="text" value="{{old('slug')}}">
                                                </div>
                                            </div>                                           
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="category" title="">Danh mục</label>
                                                <div class="col-md-4">
                                                    <select name="category_id" class="form-control">
                                                        @foreach($categories as  $category)
                                                        <option value="{{$category->id}}" selected="{{old('category_id')===$category->id?'selected':''}}">{{$category->name}}</option>
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
                                                            @if (is_array(old('tagIds')))
                                                                @foreach(old('tagIds') as $id)
                                                                    @if($id == $tag->id)
                                                                        @php($selected = true)
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                            <option value="{{$tag->id}}" {{$selected?'selected':''}}>{{$tag->name}}</option>
                                                        @endforeach

                                                        <!-- Old Data -->
                                                        @if (is_array(old('tagIds')))                                                            
                                                            @foreach(old('tagIds') as $id)
                                                                @php($selected = true)
                                                                @foreach($tags as $key =>$tag)
                                                                    @if($id == $tag->id)
                                                                        @php($selected = false)
                                                                    @endif
                                                                @endforeach
                                                                
                                                                <option value="{{$id}}" {{$selected?'selected':''}}>{{$id}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="slug" title="">Ảnh đại diện</label>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="img"/>
                                                    <span class="text-danger">{{ $errors->first('img') }}</span>                                                        
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