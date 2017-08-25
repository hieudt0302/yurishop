@extends('layouts.admin')
@section('content')
<div id="content">
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
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
          <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thêm bản tin</h5>
        </div>
        <div class="widget-content nopadding">
            {!! Form::open(array('route' => 'admin.blogs.store','method'=>'POST', 'files' => true)) !!}
              <div class="control-group">              
                {!! Form::label('title','Tiêu đề:',array('class' => 'control-lable')) !!}
                <div class="controls">
                  {!! Form::text('title') !!} <br />
                </div>
              </div>

              <div class="control-group">           
                {!! Form::label('img','Hình ảnh:',array('class' => 'control-lable')) !!}
                <div class="controls">
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
                {!! Form::label('content','Nội dung:',array('class' => 'control-lable')) !!}
                <div class="controls">
                  {!! Form::textarea('content',null,array('class' => 'form-control', 'placeholder'=>'content', 'id' => 'summernote'))!!}</br>
                </div>
              </div>         

              {!! Form::submit('Thêm mới')!!}
            {!! Form::close() !!}
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
