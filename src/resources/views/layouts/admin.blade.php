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

    <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('backend/dist/bootstrap-3.3.7/css/bootstrap.min.css')}}"> 

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/dist/font-awesome-4.7.0/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('backend/dist/ionicons-2.0.1/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('backend/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('backend/css/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('backend/css/jquery-jvectormap-2.0.3.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('backend/dist/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
  
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="{{asset('adminlte/css/daterangepicker.css')}}"> -->
  <!-- bootstrap wysihtml5 - text editor -->
  <!-- <link rel="stylesheet" href="{{asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}"> -->
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('backend/dist/select2/css/select2.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700&amp;subset=cyrillic,vietnamese" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('backend/dist/jquery-ui-1.12.1/jquery-ui.min.css')}}">
   
 <style>
    .fa.true-icon {
        color: #007FCC;
        font-size: 20px;
    }

    .fa.false-icon {
        color: #D22D2D;
        font-size: 20px;
    }

    .form-text-row {
      padding-top: 6px;
    }

    group.input-group-short .group-btn-row {
      width: auto !important;
    }
    .input-group.input-group-short .input-group-text {
      margin-right: 10px !important;
    }
 </style>
</head>
 
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="javascript:void(0)" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PK</b>F</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Poko</b>Farms</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('/images/logo/poko.png')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('backend/images/user3-128x128.jpg')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('backend/images/user4-128x128.jpg')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('backend/images/user3-128x128.jpg')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('backend/images/user4-128x128.jpg')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li> -->
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li> -->
          <!-- <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li> -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('images/logo/poko.png')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->last_name}} {{Auth::user()->first_name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('images/logo/poko.png')}}" class="img-circle" alt="User Image">

                <p>
                {{Auth::user()->last_name}} {{Auth::user()->first_name}} - Admin
                  <small>Gia nhập từ {{ date('d/m/Y',strtotime(Auth::user()->created_at))}}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('admin/users')}}/{{Auth::id()}}/edit" class="btn btn-default btn-flat">Tài Khoản</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                      @lang('auth.logout')
                  </a>
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('/images/logo/poko.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->last_name}} {{Auth::user()->first_name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{url('/admin')}}"><i class="fa fa-book"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Bán Hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/orders')}}"><i class="fa fa-circle-o"></i> Đơn Hàng</a></li>
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Tạo Mới</a></li> -->
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Thống Kê</a></li> -->
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Thiết Lập</a></li> -->
          </ul>
        </li>
        <!-- <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Sản Phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/products')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
            <li><a href="{{url('admin/products/create')}}"><i class="fa fa-circle-o"></i> Tạo Mới</a></li>
            <!-- <li><a href="{{url('admin/products/categories')}}"><i class="fa fa-circle-o"></i> Chủ Đề</a></li> -->
            <li><a href="{{url('admin/products/reviews')}}"><i class="fa fa-circle-o"></i> Đánh Giá</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Bài viết</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/posts')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>            
            <li><a href="{{url('admin/posts/create')}}"><i class="fa fa-circle-o"></i> Tạo Mới</a></li>
            <!-- <li><a href="{{url('admin/posts/categories')}}"><i class="fa fa-circle-o"></i> Chủ Đề</a></li> -->
            <li><a href="{{url('admin/posts/comments')}}"><i class="fa fa-circle-o"></i> Bình Luận</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/menu')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
            <li><a href="{{url('/admin/subject/create')}}"><i class="fa fa-circle-o"></i> Tạo Mới</a></li>
            <!-- <li><a href="{{url('/admin/subject/config')}}"><i class="fa fa-circle-o"></i> Thiết Lập</a></li> -->
          </ul>
        </li>
        <!-- FAQ -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-question"></i> <span>FAQ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/faqs')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
            <li><a href="{{url('/admin/faqs/create')}}"><i class="fa fa-circle-o"></i> Tạo Mới</a></li>
          </ul>
        </li>     

        <!-- InfoPage -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>Trang thông tin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/info-pages')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
            <li><a href="{{url('/admin/info-pages/create')}}"><i class="fa fa-circle-o"></i> Tạo Mới</a></li>
          </ul>
        </li>    

        <!-- Slider-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sliders"></i> <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/sliders')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
            <li><a href="{{url('/admin/sliders/create')}}"><i class="fa fa-circle-o"></i> Tạo Mới</a></li>
          </ul>
        </li>

        <!-- Slider-->        
        <li>
          <a href="{{url('/admin/banners/edit')}}">
            <i class="fa fa-picture-o"></i> 
            <span>Banner</span>
          </a>
        </li>                
        
        <!-- Mail Templates-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope-o"></i> <span>Mail Templates</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/mail_templates')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
            <li><a href="{{url('/admin/mail_templates/create')}}"><i class="fa fa-circle-o"></i> Tạo Mới</a></li>
          </ul>
        </li>

        <!-- Settings-->
        <li>
          <a href="{{url('/admin/subscribes')}}">
            <i class="fa fa-share-square"></i> 
            <span>Subscribe</span>
          </a>
        </li>

          <!-- User Manager -->
          <li class="treeview">
          <a href="#">
            <i class="fa fa-user-o"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/users')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
            <li><a href="{{url('/admin/users/create')}}"><i class="fa fa-circle-o"></i> Tạo Mới</a></li>
          </ul>
        </li>

        <!-- Settings-->
        <li>
          <a href="{{url('/admin/settings')}}">
            <i class="fa fa-cogs"></i> 
            <span>Cài đặt</span>
          </a>
        </li>
      
<!--         <li class="header">QUICK VIEW</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Đơn Hàng</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Sản Phẩm</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')    
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.17.11.8
    </div>
    <strong>Copyright &copy; 2018 <a href="#">Poko Farms</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
<!-- aside here- has been remove-->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <!-- <div class="control-sidebar-bg"></div> -->
</div>
    <!-- /#wrapper -->
    <!-- jQuery 3 -->
    <script src="{{asset('backend/js/jquery-3.2.1.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('backend/dist/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('backend/dist/bootstrap-3.3.7/js/bootstrap.min.js')}}"></script>
    <!-- Morris.js charts -->
    <!-- <script src="{{asset('backend/js/raphael.min.js')}}"></script> -->
    <script src="{{asset('backend/js/morris.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('backend/js/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{asset('backend/js/jquery-jvectormap-2.0.3.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <!-- <script src="{{asset('adminlte/js/jquery.knob.min.js')}}"></script> -->
    <!-- daterangepicker -->
    <script src="{{asset('backend/js/moment.js')}}"></script>
    <!-- <script src="{{asset('backend/js/daterangepicker.js')}}"></script> -->
    <!-- datepicker -->
    <script src="{{asset('backend/dist/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <!-- <script src="{{asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script> -->
    <!-- Slimscroll -->
    <!-- <script src="{{asset('adminlte/js/jquery.slimscroll.min.js')}}"></script> -->
    <!-- FastClick -->
    <!-- <script src="{{asset('adminlte/js/fastclick.js')}}"></script> -->
    <!-- AdminLTE App -->
    <script src="{{asset('backend/js/adminlte.min.js')}}"></script>     
    <script src="{{asset('backend/dist/ckeditor/ckeditor.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('backend/dist/select2/js/select2.full.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/dist/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script> 
    <script>
                (function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                })();
    </script>
    @yield('scripts')
</body>
</html>