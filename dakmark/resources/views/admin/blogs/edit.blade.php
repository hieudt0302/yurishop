@extends('layouts.admin')
@section('content')
<div id="content">
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
          <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Chỉnh sửa bài viết</h5>
          </div>
          @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @elseif (Session()->has('flash_level'))
                  <div class="alert alert-success">
                      <ul>
                          {!! Session::get('flash_massage') !!} 
                      </ul>
                  </div>
              @endif
          <div class="widget-content nopadding">
            {!! Form::model($blog,[ 'method' => 'PATCH', 'route' => ['admin.blogs.update', $blog->id] ]) !!}
              <div class="control-group">              
                {!! Form::label('title','Tiêu đề:',array('class' => 'control-lable')) !!}
                <div class="controls">
                  {!! Form::text('title') !!} <br />
                </div>
              </div>

              <div class="control-group">           
                {!! Form::label('img','Hình ảnh:',array('class' => 'control-lable')) !!}
                <div class="controls">
                  <img src="{{url('public/uploads/blogs/'.$blog->img)}}" alt="hình ảnh" width="100" height="100">
                  {!! Form::file('img', array('class' => 'image')) !!} </br>
                </div>
              </div>

              <div class="control-group">
                {!! Form::label('status','Trạng thái:',array('class' => 'control-lable')) !!}
                <div class="controls">
                  {!! Form::text('status') !!} </br>
                </div>
              </div>

              <div class="control-group">
                {!! Form::label('intro','Giới thiệu:',array('class' => 'control-lable')) !!}
                <div class="controls">
                  {!! Form::textarea('intro',null,array('class' => 'form-control', 'placeholder'=>'intro'))!!}</br>
                </div>
              </div>               

              <div class="control-group">
                {!! Form::label('content','Nội dung:',array('class' => 'control-lable')) !!}
                <div class="controls">
                  {!! Form::textarea('content',null,array('class' => 'form-control', 'placeholder'=>'content', 'id' => 'summernote'))!!}</br>
                </div>
              </div>         

              {!! Form::submit('Lưu thay đổi')!!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
