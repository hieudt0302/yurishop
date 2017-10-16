
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">
<head>
	<!-- Basic need -->
	<title>Open Pediatrics</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">
	<!-- <link rel="shortcut icon" href="images/favicon.ico"> -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:bold,black,regular">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Playfair+Display:bold,italic,bolditalic">
	<!-- Fonts -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" >
	<link  rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:400,700,900">
	<!-- -->
	<!-- Mobile specific meta -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone-no">
	<!-- CSS files -->
	<!-- CSS files -->
    <link rel="stylesheet" href="{{asset('frontend/css/plugins.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
	@yield('header')
</head>
<body>
	

	<div id="sideNav2" class="sidenav">
	  <p class="cart-product">No products in the cart</p>
	  <a href="#" class="closebtn2"><i class="ion-android-close"  data-toggle="tooltip" data-placement="left" title="Close"></i></a>
	</div>
	<div id="sideNav3" class="sidenav">
	  <p class="cart-product">No products in the cart</p>
	  <a href="#" class="closebtn3"><i class="ion-android-close"  data-toggle="tooltip" data-placement="left" title="Close"></i></a>
	</div>
	<div id="sideNav4" class="sidenav">
	  <p class="cart-product">No products in the cart</p>
	  <a href="#" class="closebtn4"><i class="ion-android-close"  data-toggle="tooltip" data-placement="left" title="Close"></i></a>
	</div>
	<div id="sideNav5" class="sidenav">
	  <p class="cart-product">No products in the cart</p>
	  <a href="#" class="closebtn5"><i class="ion-android-close"  data-toggle="tooltip" data-placement="left" title="Close"></i></a>
	</div>
	 
	<!-- Mobile Menu -->
	<div class="mobile-menu">
    	@include('layouts.mobile_menu')
    </div>
    <!-- End Mobile Menu -->

    <!-- Main Page -->
	<div id="page" class="allpage">
		@yield('top')

		<!-- Navigation panel -->
		@include('layouts.nav')

		<!-- End Navigation panel -->
		@yield('content')

		<!-- Foter -->
		@include('layouts.footer')
		<!-- End Foter -->
		<!-- End Main Page -->

 	</div>

	 <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
	 <script src="{{asset('frontend/js/plugins.js')}}"></script>
	 <script src="{{asset('frontend/js/custom.js')}}"></script>
	 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <script src="https://npmcdn.com/isotope-layout@3.0/dist/isotope.pkgd.min.js"></script>
	 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAguiQMk8GSqnO6GHpkgS8txEqYNXDjp4k&callback=initialize"
		 type="text/javascript"></script>

		  <!-- <script type="text/javascript" src="{{ asset('js/app.js') }}"></script> -->
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