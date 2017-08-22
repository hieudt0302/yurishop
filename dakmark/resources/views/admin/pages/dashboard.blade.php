@extends('layouts.admin')

@section('title', 'Dashboard')
@section('description', 'This is the dashboard')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
            @include('notifications.status_message')
            @include('notifications.errors_message')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-product-hunt fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">26</div>
                            <div>Sản phẩm</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/products') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                         <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-newspaper-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">12</div>
                            <div>Blogs</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/blogs') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">124</div>
                            <div>Đơn hàng</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/orders') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">13</div>
                            <div>Khách hàng</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/users') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-shopping-cart fa-fw"></i>Đơn hàng mới nhất</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Thời gian</th>
                                    <th>Khách hàng</th>
                                    <th>Tình trạng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>10-08-2017 10:00</td>
                                    <td>John Lee</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>10-08-2017 10:00</td>
                                    <td>John Lee</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>10-08-2017 10:00</td>
                                    <td>John Lee</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                                <tr>
                                    <td>10-08-2017 10:00</td>
                                    <td>John Lee</td>
                                    <td>Chờ xác nhận</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="{{ url('/admin/blank') }}">Xem tất cả<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-user fa-fw"></i>Khách hàng mới nhất</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Khách hàng</th>
                                    <th>Thời gian</th>
                                    <th>Tình trạng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="">David Hill</a></td>
                                    <td>10-08-2017 10:00</td>
                                    <td>Chưa kích hoạt</td>
                                </tr>
                                <tr>
                                    <td><a href="">John Lee</a></td>
                                    <td>10-08-2017 10:00</td>
                                    <td>Đã kích hoạt</td>
                                </tr>
                                <tr>
                                    <td><a href="">John Lee</a></td>
                                    <td>10-08-2017 10:00</td>
                                    <td>Đã kích hoạt</td>
                                </tr>
                                <tr>
                                    <td><a href="">John Lee</a></td>
                                    <td>10-08-2017 10:00</td>
                                    <td>Đã kích hoạt</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="{{ url('/admin/blank') }}">Xem tất cả<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>Hoạt động mới nhất</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <a href="{{ url('/admin/blank') }}" class="list-group-item">
                            <span class="badge">just now</span>
                            <i class="fa fa-fw fa-calendar"></i> Calendar updated
                        </a>
                        <a href="{{ url('/admin/blank') }}" class="list-group-item">
                            <span class="badge">4 minutes ago</span>
                            <i class="fa fa-fw fa-comment"></i> Commented on a post
                        </a>
                        <a href="{{ url('/admin/blank') }}" class="list-group-item">
                            <span class="badge">23 minutes ago</span>
                            <i class="fa fa-fw fa-truck"></i> Order 392 shipped
                        </a>
                        <a href="{{ url('/admin/blank') }}" class="list-group-item">
                            <span class="badge">46 minutes ago</span>
                            <i class="fa fa-fw fa-money"></i> Invoice 653 has been paid
                        </a>
                        <a href="{{ url('/admin/blank') }}" class="list-group-item">
                            <span class="badge">1 hour ago</span>
                            <i class="fa fa-fw fa-user"></i> A new user has been added
                        </a>
                    </div>
                    <div class="text-right">
                        <a href="{{ url('/admin/blank') }}">Xem tất cả <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
             
@endsection
