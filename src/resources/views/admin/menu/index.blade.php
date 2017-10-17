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
                            <th>Tên</th>
                            <th>Vị Trí</th>
                            <th>Hiển Thị</th>
                            <th>Xuất Bản</th>
                            <th>Ngày Tạo</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên</th>
                            <th>SKU</th>
                            <th>Xuất Bản(s)</th>
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