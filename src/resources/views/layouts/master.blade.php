<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <meta name="author" content="DakMark">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <!-- Favicons -->
        <link rel="shortcut icon" href="images/favicon.png">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
        
        <!-- CSS -->        
        <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style-responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/vertical-rhythm.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('css/rev-slider.css') }}">
        <link rel="stylesheet" href="{{ asset('rs-plugin/css/settings.css') }}" media="screen" />  
         
        @yield('header')
    </head>
    <body class="appear-animate">
        
        <!-- Page Loader -->        
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <!-- End Page Loader -->
        
        <!-- Page Wrap -->
        <div class="page" id="top">
            
            <!-- Navigation panel -->
            @include('layouts.nav')
            <!-- End Navigation panel -->

            @yield('content')


            <!-- Foter -->
            @include('layouts.footer')
            <!-- End Foter -->
            
        </div>
        <!-- End Page Wrap -->
                
        <!-- JS -->
        <script type="text/javascript" src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>        
        <script type="text/javascript" src="{{ asset('js/SmoothScroll.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.localScroll.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.viewport.mini.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.countTo.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.appear.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.sticky.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.parallax-1.1.3.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.fitvids.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Replace test API Key "AIzaSyAZsDkJFLS0b59q7cmW0EprwfcfUA8d9dg" with your own one below 
        **** You can get API Key here - https://developers.google.com/maps/documentation/javascript/get-api-key -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZsDkJFLS0b59q7cmW0EprwfcfUA8d9dg"></script>
        <script type="text/javascript" src="{{ asset('js/gmap3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.simple-text-rotator.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/all.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/contact-form.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script> 
        <script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/rev-slider.js') }}"></script>        
        <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->
        
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
