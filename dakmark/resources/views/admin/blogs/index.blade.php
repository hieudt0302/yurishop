@extends('layouts.admin')
@section('content')
<div id="content">
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
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
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Danh sách Blogs </h5> 
                  <a href="{{url('admin/blogs/create-form')}}" class="btn btn-success" title="new">Thêm bài viết</a>
            <!--start-top-serch-->
            <div id="search">
              <form action="{{url('/admin/blogs/search')}}" method="POST" accept-charset="utf-8">
                <input type="hidden" name="_token" value="{{ csrf_token()  }}">
                <input type="text" name="key" placeholder="Nhập từ khóa..." style="min-width: 250px;" />
                <button type="submit" class="tip-bottom" title="Tìm kiếm"><i class="fa fa-search"></i></button>
              </form>
            </div>
            <!--close-top-serch-->
          </div>
          @if($type !='search')
          <div class="pagination alternate pull-right" style="margin-top: -10px; margin-bottom: 5px; margin-right: 10px;">
              {{$blogs->render()}}
            </div>
          @endif
          <div class="widget-content nopadding">
            @if($type =='search')
              <h4 style="padding-left: 15px"> kết quả tìm kiếm 20 bản tin hàng đầu với từ khóa : <span style="color: red; font-weight: bold;"> {{$key}}</span> </h4>
            @endif
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align: center; width: 40px;" >ID</th>                  
                  <th>Hình ảnh</th>
                  <th>Tiêu dề bản tin</th>
                  <th>Trạng thái</th>                                                
                  <th>Ngày viết</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @foreach($blogs as $row)
                  <tr>
                    <td >{{$row->id}}</td>
                    <td >
                      <img src="{{url('public/uploads/blogs/'.$row->img)}}" alt="img" width="50" height="20">
                    </td>
                    <td >{{$row->title}}</td>                                                                                                       
                    <td style="text-align: center;" > 
                      @if($row->status == 1)
                        Hiển thị
                      @else
                        Tạm ẩn
                      @endif                     
                    </td>                    
                    <td style="width:120px; "> {{ $row->created_at}}</td>
                    <td style="width:120px; text-align: center;  ">
                      <a href="{{url('admin/blogs/'.$row->id.'/edit')}}" title="Sửa"><strong class="btn btn-info">Sửa</strong></a>
                      {!! Form::open(['method' => 'DELETE','route' => ['admin.blogs.destroy', $row->id],'style'=>'display:inline']) !!}
                      {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @if($type !='search')
            <div class="pagination alternate pull-left" style="margin-top: -10px; margin-bottom: 5px; margin-right: 10px; font-size: 18px;">
              {{$blogs->render()}}
            </div>
          @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection