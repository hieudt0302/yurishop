
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
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="profile" href="#">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700&amp;subset=cyrillic,vietnamese" rel="stylesheet">
	<!-- <link rel="shortcut icon" href="images/favicon.ico"> -->
	<!-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:bold,black,regular"> -->
	<!-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Playfair+Display:bold,italic,bolditalic"> -->
	<!-- Fonts -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700&amp;subset=cyrillic,vietnamese" rel="stylesheet">	 -->
	<!-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" > -->
	<!-- <link  rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:400,700,900"> -->
	<!-- -->
	<link  rel="stylesheet" type="text/css" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
	<link  rel="stylesheet" type="text/css"  href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- Mobile specific meta -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone-no">
	<!-- CSS files -->
	<!-- CSS files -->
    <link rel="stylesheet" href="{{asset('frontend/css/plugins.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/video.css')}}">	
	<link rel="stylesheet" href="{{asset('frontend/css/custom-style.css')}}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('frontend/images/favicons/apple-touch-icon.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('frontend/images/favicons/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('frontend/images/favicons/favicon-16x16.png')}}">
	<link rel="manifest" href="{{asset('frontend/images/favicons/manifest.json')}}">
	<link rel="mask-icon" href="{{asset('frontend/images/favicons/safari-pinned-tab.svg')}}" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">	
	<!-- <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap-dropdownhover.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/hover-min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/ionicons.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/lightbox.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/nivo-lightbox.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/normalize.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/organie.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/owl.theme.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/owl.transitions.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/pushy.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/revicons.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/settings.css')}}"> -->
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
	@yield('header')
<meta name="google-site-verification" content="SBNKsjbUQHBBai8E7O5TxOH4R1pHOiD1F2qaSZbPxBk" />	
</head>
<body>
	<div class="topsearch">
		{!! Form::open(array('url' => '/search')) !!}
            <input type="text" class="search-top" name="key" placeholder="@lang('header.enter-keyword')">
        {!! Form::close() !!}
    </div>
    <div class="mobile-menu">
	    <nav id="menu">
	        <ul class="main-menu clearfix">
	            <li><a href="{{ url('/')}}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
	            <li><a href="{{ url('/about')}}">Pô Kô Farms</a></li>
	            @foreach($blog_menu as $menu)
	            <li>
	                <a href="{{url('/subject')}}/{{$menu->parent->slug}}/{{$menu->slug}}">{{$menu->translation->name??$menu->name}}</a>
	            </li>  
	            @endforeach

	            <li><a href="#">{{$product_menu->translation->name??$product_menu->name}}</a><i class="ion-ios-arrow-down it1"></i>
	                <ul class="sub-menu sub1">
	                    @foreach($product_menu->GetMenuSubLevel1() as $sub)
	                    <li>
	                        <a href="{{url('/subject')}}/{{$sub->parent->slug}}/{{$sub->slug}}">
	                            <i class="fa fa-angle-right" aria-hidden="true"></i> {{$sub->translation->name??$sub->name}}
	                        </a>
	                    </li>
	                    @endforeach
	                </ul>
	            </li>
	            <li><a href="{{ url('/contact')}}">@lang('header.contact')</a></li>
	        </ul>
	    </nav>
	</div>
	
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
	<script src="{{asset('frontend/js/plugins.js')}}"></script>
	<script src="{{asset('frontend/js/custom.js')}}"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="{{asset('frontend/js/jquery.elevateZoom-3.0.8.min.js')}}"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://npmcdn.com/isotope-layout@3.0/dist/isotope.pkgd.min.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJyWgPF1EBDeQjx4ctp4e_DuoLi7Zf8OA" type="text/javascript"></script>

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