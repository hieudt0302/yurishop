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
              {!! Form::label('title','Tiêu đề:') !!}
              {!! Form::text('title') !!} <br />
           
              {!! Form::label('img','Link ảnh:') !!}
              {!! Form::text('img') !!} </br>

              {!! Form::label('status','Trạng thái:') !!}
              {!! Form::text('status') !!} </br>

              {!! Form::label('content','Nội dung:') !!}
              {!! Form::textarea('content') !!} </br>
           
              {!! Form::submit('Cap Nhat')!!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
