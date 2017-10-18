@extends('layouts.admin')
@section('title','Menu - Admin')

@section('content')
<section class="content-header">
      <h1 class="pull-left">
        Menu
        <small>Danh Sách</small>
      </h1>
      <div class="pull-right">
        <a href="{{('/admin/menu/create')}}" class="btn bg-blue">
            <i class="fa fa-plus-square"></i>
            Thêm mới
        </a>
      </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3> Danh Sách Menu Chính
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th colspan="2">#</th>
                            <th>Tên</th>
                            <th>Vị Trí</th>
                            <th>Hiển Thị</th>
                            <th>Khóa</th>
                            <th>Ngày Tạo</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($menus as $key => $menu )
                      <tr>
                        <td colspan="2">{{$key + 1}}.</td>
                        <td>{{$menu->name}}</td>
                        <td>{{$menu->order}}</td>
                        <td>
                            @if($menu->is_visible) 
                            <i class="fa fa-check true-icon"></i>
                            @else 
                            <i class="fa fa-check false-icon"></i>
                            @endif
                        </td>
                        <td>
                            @if($menu->enabled) 
                            <i class="fa fa-check true-icon"></i>
                            @else 
                            <i class="fa fa-check false-icon"></i>
                            @endif
                        </td>
                        <td>{{$menu->created_at}}</td>
                        <td>
                           <a class="btn btn-primary btn-sm" href="{{url('/')}}/admin/menu/{{$menu->id}}/edit"> <i class="fa fa-edit"></i></a>
                        </td>
                        <td>
                              {!! Form::open(['method' => 'DELETE','route' => ['admin.menu.destroy', $menu->id],'style'=>'display:inline']) !!}
                              {{ Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit','class' => 'btn btn-warning btn-sm'] )  }}
                              {!! Form::close() !!}  
                        </td>
                      </tr>
                        @foreach($menu->GetMenuSubLevel1() as $i => $sub )
                        <tr>
                          <td></td>
                          <td>{{$key+1}}.{{$i + 1}}.</td>
                          <td>{{$sub->name}}</td>
                          <td>{{$sub->order}}</td>
                          <td>
                            @if($sub->is_visible) 
                            <i class="fa fa-check true-icon"></i>
                            @else 
                            <i class="fa fa-check false-icon"></i>
                            @endif
                          </td>
                          <td>
                            @if($sub->enabled) 
                            <i class="fa fa-check true-icon"></i>
                            @else 
                            <i class="fa fa-check false-icon"></i>
                            @endif
                          </td>
                          <td>{{$sub->created_at}}</td>
                          <td>
                            <a class="btn btn-primary btn-sm" href="{{url('/')}}/admin/menu/{{$sub->id}}/edit"> <i class="fa fa-edit"></i></a>

                          </td>
                          <td>
                              {!! Form::open(['method' => 'DELETE','route' => ['admin.menu.destroy', $sub->id],'style'=>'display:inline']) !!}
                              {{ Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit','class' => 'btn btn-warning btn-sm'] )  }}
                              {!! Form::close() !!}  
                          </td>
                        </tr>
                        @endforeach
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                          <th colspan="2">#</th>
                          <th>Tên</th>
                          <th>Vị Trí</th>
                          <th>Hiển Thị</th>
                          <th>Khóa</th>
                          <th>Ngày Tạo</th>
                          <th colspan="2"></th>
                      </tr>
                    </tfoot>
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