@extends('layouts.admin')

@section('title', 'Dashboard')
@section('description', 'This is the dashboard')

@section('content')<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{$order_new}}</h3>

          <p>Đơn Hàng Mới</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{url('admin/orders')}}" class="small-box-footer">Chi Tiết <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{$order_wait}}</h3>

          <p>Đơn Hàng Chờ Giao</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{url('admin/orders')}}" class="small-box-footer">Chi Tiết <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>{{$product_count}}</h3>

          <p>Sản Phẩm</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="{{url('admin/products')}}" class="small-box-footer">Chi Tiết <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{$user_new}}</h3>

          <p>Người Dùng Mới</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{url('admin/users')}}" class="small-box-footer">Chi Tiết<i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->        
@endsection

@section('scripts')

@endsection