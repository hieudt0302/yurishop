@extends('layouts.admin')
@section('content')
<div id="content">
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
          <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thêm bản tin</h5>
        </div>
        <div class="widget-content nopadding">
            {!! Form::open(array('route' => 'admin.blogs.store','method'=>'POST')) !!}
              {!! Form::label('title','Tiêu đề:') !!}
              {!! Form::text('title') !!} <br />
           
              {!! Form::label('img','Link ảnh:') !!}
              {!! Form::text('img') !!} </br>

              {!! Form::label('status','Trạng thái:') !!}
              {!! Form::text('status') !!} </br>

              {!! Form::label('content','Nội dung:') !!}
              {!! Form::textarea('content') !!} </br>
           
              {!! Form::submit('Thêm mới')!!}
            {!! Form::close() !!}
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
