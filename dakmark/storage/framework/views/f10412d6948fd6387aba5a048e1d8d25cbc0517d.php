<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap -->
    <link href="<?php echo e(url('/')); ?>/public/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(url('/')); ?>/public/assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- Ionicons -->
    <link href="<?php echo e(url('/')); ?>/public/assets/css/ionicons/ionicons.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link href="<?php echo e(url('/')); ?>/public/assets/css/adminlte/AdminLTE.min.css" rel="stylesheet">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link href="<?php echo e(url('/')); ?>/public/assets/css/adminlte/skins/skin-blue.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&amp;subset=vietnamese"
        rel="stylesheet">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>ADM</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>ADMIN</b></span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the messages -->
                                    <ul class="menu">
                                        <li>
                                            <!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <!-- User Image -->
                                                    <img src="<?php echo e(url('/')); ?>/public/assets/img/user-160x160.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <!-- Message title and timestamp -->
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <!-- The message -->
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                    </ul>
                                    <!-- /.menu -->
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- /.messages-menu -->

                        <!-- Notifications Menu -->
                        <li class="dropdown notifications-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">0</span>
            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Bạn có 0 thông báo</li>
                                <li>
                                    <!-- Inner Menu: contains the notifications -->
                                    <ul class="menu">
                                        <li>
                                            <!-- start notification -->
                                            <a href="#">
                      <i class="fa fa-users text-aqua"></i> 0 thành viên tham gia ngày hôm nay!
                    </a>
                                        </li>
                                        <!-- end notification -->
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks Menu -->
                        <li class="dropdown tasks-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Bạn còn 0 việc cần làm</li>
                                <li>
                                    <!-- Inner menu: contains the tasks -->
                                    <ul class="menu">
                                        <li>
                                            <!-- Task item -->
                                            <a href="#">
                                                <!-- Task title and progress text -->
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <!-- The progress bar -->
                                                <div class="progress xs">
                                                    <!-- Change the css width attribute to simulate progress -->
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="<?php echo e(url('/')); ?>/public/assets/img/user-160x160.jpg" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?php echo e(Auth::user()->last_name); ?> <?php echo e(Auth::user()->first_name); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="<?php echo e(url('/')); ?>/public/assets/img/user-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo e(Auth::user()->last_name); ?> <?php echo e(Auth::user()->first_name); ?> - <?php echo e(Auth::user()->roles->first()->name); ?>

                                        <small>Thành viên từ <?php echo e(Auth::user()->created_at); ?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <!-- <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div> -->
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo e(url('/logout')); ?>" class="btn btn-default btn-flat">Thoát</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo e(url('/')); ?>/public/assets/img/user-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo e(Auth::user()->last_name); ?> <?php echo e(Auth::user()->first_name); ?></p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- search form (Optional) -->
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

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">QUẢN LÝ HỆ THỐNG</li>
                    <!-- Optionally, you can add icons to the links -->
                    <!-- <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
                    <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li> -->
                    <li id="dasboard" class="active treeview">
                        <a href="<?php echo e(url('/admin')); ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Bảng Điều Khiển</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?php echo e(url('/admin')); ?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
                            <li><a href="<?php echo e(url('/admin')); ?>"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                        </ul>
                    </li>
                    <?php if (\Entrust::can('user-list')) : ?>
                    <li id="order" class="treeview">
                        <a href="#"><i class="fa fa-shopping-cart"></i> <span>Đơn Đặt Hàng</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?php echo e(url('/admin/orders')); ?>"><i class="fa fa-circle-o"></i> Người Dùng
                                    <span class="pull-right-container">
                                        <?php if(Order::countwork() > 0): ?>
                                        <small class="label pull-right bg-orange" title="<?php echo e(Order::countwork()); ?> đơn hàng chờ giao"><?php echo e(Order::countwork()); ?></small>
                                        <?php endif; ?>
                                        <?php if(Order::countnew() > 0): ?>
                                        <small class="label pull-right bg-green-active" title="<?php echo e(Order::countnew()); ?> đơn hàng đang cần duyệt"><?php echo e(Order::countnew()); ?> Mới</small>
                                        <?php endif; ?>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/admin/ordershops')); ?>">
                                    <i class="fa fa-circle-o"></i> Cửa Hàng
                                    <span class="pull-right-container">
                                        <?php if(OrderShop::countwork() > 0): ?>
                                        <small class="label pull-right bg-orange" title="<?php echo e(OrderShop::countwork()); ?> đơn hàng đang làm việc"><?php echo e(OrderShop::countwork()); ?></small>
                                        <?php endif; ?>
                                        <?php if(OrderShop::countnew() > 0): ?>
                                        <small class="label pull-right bg-light-blue" title="<?php echo e(OrderShop::countnew()); ?> đơn hàng đang cần gửi"><?php echo e(OrderShop::countnew()); ?> Chờ</small>
                                        <?php endif; ?>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; // Entrust::can ?> <?php if (\Entrust::can('user-list')) : ?>
                    <li id="user" class="treeview">
                        <a href="#"><i class="fa fa-users"></i> <span>Người Dùng</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo e(url('/admin/users')); ?>"><i class="fa fa-circle-o"></i> Thành Viên</a></li>
                            <?php if (\Entrust::can('user-list')) : ?>
                            <li><a href="<?php echo e(url('/admin/roles')); ?>"><i class="fa fa-circle-o"></i> Quyền</a></li>
                            <?php endif; // Entrust::can ?>
                        </ul>
                    </li>
                    <?php endif; // Entrust::can ?>
                    <li id="setting" class="treeview">
                        <a href="#"><i class="fa fa-wrench"></i> <span>Cài Đặt</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo e(url('/admin/rates')); ?>"><i class="fa fa-circle-o"></i> Tỷ Giá</a></li>
                            <li><a href="<?php echo e(url('/admin/blank')); ?>"><i class="fa fa-circle-o"></i> Cài Đặt Chung</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1><?php echo $__env->yieldContent('pageheader'); ?><small><?php echo $__env->yieldContent('pagedescription'); ?></small></h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Quản Lý</a></li>
                    <li><a href="#"><?php echo $__env->yieldContent('breadarea'); ?></a></li>
                    <li class="active"><?php echo $__env->yieldContent('breaditem'); ?></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <!--------------------------| Your Page Content Here | -------------------------->
                <?php echo $__env->yieldContent('content'); ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Designed by Japan Computer Software Co., Ltd
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="https://www.taobaodanang.com/" target="_blank">TAOBAO DA NANG</a>.</strong>            All rights reserved
        </footer>

        <!-- Control Sidebar -->

        <!-- bravohex: REMOVE -->

        <!-- /.control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery-->
    <script src="<?php echo e(url('/')); ?>/public/assets/js/jquery-1.12.4.js"></script>

    <!-- Bootstrap -->
    <script src="<?php echo e(url('/')); ?>/public/assets/js/bootstrap.min.js"></script>

    <!-- AdminLTE App -->
    <script src="<?php echo e(url('/')); ?>/public/assets/js/adminlte/adminlte.min.js"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
    <!-- Sefl Script -->
    <script>
        // $(document).ready(function () {
        //     $("#dasboard").click(function () {
        //         $("#order").removeClass("active");

        //         // $("#dasboard").addClass("active"); 
        //         $(this).addClass("active");
        //     });
        // });
    </script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>