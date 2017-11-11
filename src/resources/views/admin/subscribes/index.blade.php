@extends('layouts.admin')
@section('title','Subscribes - Admin')

@section('content')
<section class="content-header">
      <h3 class="pull-left">
        Danh sách email đã đăng ký
      </h3>
</section>
<section class="content">
  <div class="row" style="clear: both;">
    @if ($message = Session::get('success_message'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    @if ($message = Session::get('danger_message'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
    @endif
  </div>
  <div class="row" class="search-box" style="margin: 15px 0 10px 0px;">
    <div class="col-sm-9">
      {!! Form::open(array('route' => 'admin.subscribes.search')) !!}
        <div class="col-sm-2">
          <span class="search-label">Tìm kiếm Email</span>
        </div>
        <div class="col-sm-6">
          <input type="text" name="email" class="form-control search-input" placeholder="Nhập email" autofocus="true">
        </div>
        <div class="col-sm-2">
          <button type="submit" class="btn btn-primary search-btn">Tìm kiếm</button>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Locale</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($email_subscribed as $key => $email )
                      <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{ $email->email }}</td>
                        <td>{{ $email->locale }}</td>
                        <td>
                              {!! Form::open(['method' => 'DELETE','route' => ['admin.subscribes.destroy', $email->id],'style'=>'display:inline']) !!}
                              {{ Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit','class' => 'btn btn-warning btn-sm'] )  }}
                              {!! Form::close() !!}  
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')

<script>
    $(function() {
        
    });
</script>
@endsection