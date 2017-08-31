<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
     
    <meta name="description" content="@yield('description')">
 
    <link href="{{url('/')}}/public/assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{url('/')}}/public/assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{url('/')}}/public/assets/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="{{url('/')}}/public/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">  
    <!-- Morris Charts CSS -->
    <!-- <link href="{!! asset('assets/css/plugins/morris.css') !!}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{url('/')}}/public/assets/css/morris.css">
    <link rel="stylesheet" href="{{url('/')}}/public/assets/css/admin.css">
    <link rel="stylesheet" href="{{url('/')}}/public/assets/css/custom.css">
    <link rel="stylesheet" href="{{url('/')}}/public/assets/css/summernote.css">
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="{{url('/')}}/public/assets/js/jquery-1.12.4.js"></script>
    <script src="{{url('/')}}/public/assets/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/public/assets/js/summernote.js"></script>    
 
</head>
 
<body>
    <div id="wrapper">
 
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">WOM - ADMIN PANEL</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    @if (Auth::guest())
                    <a href="#"><i class="fa fa-user"></i> Danger: Unknown User</a>
                    @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ url('/admin/blank') }}"><i class="fa fa-fw fa-user"></i> Tài Khoản</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off"></i> Thoát
                            </a>
 
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul> 
                    @endif                  
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="{{ url('/admin') }}"><i class="fa fa-fw fa-dashboard"></i> Bảng Điều Khiển</a>
                    </li>
                    @permission('user-list')
                    <li>
                        <a href="{{ url('/admin/users') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Người Dùng</a>
                    </li>
                    @endpermission
                    @permission('role-list')
                    <li>
                        <a href="{{ url('/admin/roles') }}"><i class="fa fa-fw fa-table"></i> Quyền</a>
                    </li>
                    @endpermission
                    <li>
                        <a href="{{ url('/admin/navigator') }}"><i class="fa fa-fw fa-bars"></i>Menu</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/product-cat') }}"><i class="fa fa-fw fa-folder"></i> Danh mục sản phẩm</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/product') }}"><i class="fa fa-fw fa-product-hunt "></i> Sản phẩm</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/orders') }}"><i class="fa fa-fw fa-edit"></i> Đơn Đặt Hàng</a>
                    </li>
					<li>
                        <a href="{{ url('/admin/blog-cat') }}"><i class="fa fa-fw fa-folder"></i> Danh mục blog</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/blog') }}"><i class="fa fa-fw fa-newspaper-o"></i> Blogs</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/blank') }}"><i class="fa fa-fw fa-wrench"></i> Cài Đặt</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
 
        <div id="page-wrapper">
         
            @yield('content')
 
        </div>
        <!-- /#page-wrapper -->
 
    </div>
    <!-- /#wrapper -->
    <!-- Morris Charts JavaScript -->
    <script src="{{url('/')}}/public/assets/js/plugins/morris/raphael.min.js"></script>
    <script src="{{url('/')}}/public/assets/js/plugins/morris/morris.min.js"></script>
    <script src="{{url('/')}}/public/assets/js/plugins/morris/morris-data.js"></script>
     
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
              height:300,
            });
        });
    </script>
</body>
</html>