@extends('layouts.admin')
@section('title','Menu - Admin')

@section('content')
<section class="content-header">
      <h1>
        Menu
        <small>Danh Sách</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Menu</a></li>
        <li class="active">Danh Sách</li>
      </ol>
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
                            <th>#</th>
                            <td></td>
                            <th>Tên</th>
                            <th>Vị Trí</th>
                            <th>Hiển Thị</th>
                            <th>Khóa</th>
                            <th>Ngày Tạo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($menus as $key => $menu )
                      <tr>
                        <td>{{$key + 1}}</td>
                        <td></td>
                        <td>{{$menu->name}}</td>
                        <td>{{$menu->order}}</td>
                        <td>{{$menu->is_visible}}</td>
                        <td>{{$menu->enabled}}</td>
                        <td>{{$menu->created_at}}</td>
                        <td></td>
                      </tr>
                        @foreach($menu->GetMenuSubLevel1() as $i => $sub )
                        <tr>
                          <td></td>
                          <td>{{$i + 1}}</td>
                          <td>>> {{$sub->name}}</td>
                          <td>{{$sub->order}}</td>
                          <td>{{$sub->is_visible}}</td>
                          <td>{{$sub->enabled}}</td>
                          <td>{{$sub->created_at}}</td>
                          <td></td>
                        </tr>
                        @endforeach
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                          <th>#</th>
                          <th>Tên</th>
                          <th>Vị Trí</th>
                          <th>Hiển Thị</th>
                          <th>Khóa</th>
                          <th>Ngày Tạo</th>
                          <th></th>
                          <th></th>
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