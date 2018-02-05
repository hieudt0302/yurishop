
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Demo Shop 4 | Porto - Responsive HTML5 Template 5.7.2</title>	

		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{asset('frontend/img/favicon.ico')}}" type="image/x-icon" />
		<link rel="apple-touch-icon" href="{{asset('frontend/img/apple-touch-icon.png')}}">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/font-awesome/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/animate/animate.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/owl.carousel/assets/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/owl.carousel/assets/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/magnific-popup/magnific-popup.min.css')}}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('frontend/css/theme.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/css/theme-elements.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/css/theme-blog.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/css/theme-shop.css')}}">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="{{asset('frontend/vendor/rs-plugin/css/settings.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/rs-plugin/css/layers.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/rs-plugin/css/navigation.css')}}">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{asset('frontend/css/skins/skin-shop-8.css')}}"> 

		<!-- Demo CSS -->
		<link rel="stylesheet" href="{{asset('frontend/css/demos/demo-shop-8.css')}}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">

		<!-- Head Libs -->
		<script src="{{asset('frontend/vendor/modernizr/modernizr.min.js')}}"></script>

	</head>
	<body>
		
	    <!-- Main Page -->
		<div class="body">
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
	 	
		<!-- Vendor -->
		<script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/jquery.appear/jquery.appear.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/jquery-cookie/jquery-cookie.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/common/common.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/jquery.validation/jquery.validation.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/jquery.gmap/jquery.gmap.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/jquery.lazyload/jquery.lazyload.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/isotope/jquery.isotope.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/vide/vide.min.js')}}"></script>
		<script type="text/javascript" src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script> 
		<!-- Theme Base, Components and Settings -->
		<script src="{{asset('frontend/js/theme.js')}}"></script>


		<script src="{{asset('frontend/vendor/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

		<!-- Current Page Vendor and Views -->
		<script src="{{asset('frontend/js/views/view.contact.js')}}"></script>



		<!-- Demo -->
		<script src="{{asset('frontend/js/demos/demo-shop-4.js')}}"></script>
		
		<!-- Theme Custom -->
		<script src="{{asset('frontend/js/custom.js')}}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{asset('frontend/js/theme.init.js')}}"></script>
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