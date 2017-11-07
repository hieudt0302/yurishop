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
      <div class="row">
        <div class="col-xs-12">
            @include('notifications.status_message') 
            @include('notifications.errors_message') 
        </div>
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
                              <!-- {!! Form::open(['method' => 'DELETE','route' => ['admin.menu.destroy', $menu->id],'style'=>'display:inline']) !!}
                              {{ Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit','class' => 'btn btn-warning btn-sm'] )  }}
                              {!! Form::close() !!}   -->
                              <a type="button" class="btn btn-danger" data-menu-id="{{$menu->id}}" data-toggle="modal" data-target="#modal-delete-menu">
                                    <i class="fa fa-ban"></i>
                                </a> 
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
                              <!-- {!! Form::open(['method' => 'DELETE','route' => ['admin.menu.destroy', $sub->id],'style'=>'display:inline']) !!}
                              {{ Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit','class' => 'btn btn-warning btn-sm'] )  }}
                              {!! Form::close() !!}   -->
                                <a type="button" class="btn btn-danger" data-menu-id="{{$sub->id}}" data-toggle="modal" data-target="#modal-delete-menu">
                                    <i class="fa fa-ban"></i>
                                </a> 
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

<!-- QUESTION TO DELETE -->
<div class="modal modal-danger fade" id="modal-delete-menu">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cảnh Báo</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa menu này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                <form name="form-menu-delete"  method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-outline" value="Xóa Menu">
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@section('scripts')

<script>
    $(function() {
        $('#modal-delete-menu').on('show.bs.modal', function (e) {
            var menuID = $(e.relatedTarget).data('menu-id');
            var action = "{{url('admin/menu')}}/" + menuID;
            $(e.currentTarget).find('form[name="form-menu-delete"]').attr("action", action);
        })  
    });
</script>
@endsection