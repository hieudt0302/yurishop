<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>

        <!-- Favicons -->
        <link rel="shortcut icon" href="images/favicon.png">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">        
        
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/image.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/table.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/checkbox-radio.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/spinner.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/auth.css" type="text/css" media="all">

        <!-- CSS -->
        <link rel="stylesheet" href="{{url('/')}}/public/assets/rhythm/css/style.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/rhythm/css/style-responsive.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/rhythm/css/animate.min.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/rhythm/css/vertical-rhythm.min.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/rhythm/css/owl.carousel.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/rhythm/css/magnific-popup.css">          
        
        <!-- JS -->
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/SmoothScroll.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/jquery.localScroll.min.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/jquery.viewport.mini.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/jquery.countTo.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/jquery.appear.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/jquery.sticky.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/jquery.magnific-popup.min.js"></script>
        <!-- Replace test API Key "AIzaSyAZsDkJFLS0b59q7cmW0EprwfcfUA8d9dg" with your own one below 
        **** You can get API Key here - https://developers.google.com/maps/documentation/javascript/get-api-key -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZsDkJFLS0b59q7cmW0EprwfcfUA8d9dg"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/gmap3.min.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/wow.min.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/jquery.simple-text-rotator.min.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/all.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/contact-form.js"></script>
        <script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/jquery.ajaxchimp.min.js"></script>        
        <!--[if lt IE 10]><script type="text/javascript" src="{{url('/')}}/public/assets/rhythm/js/placeholder.js"></script><![endif]-->        
        

    </head>
    <body class="appear-animate">
        <!-- Page Loader -->        
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <!-- End Page Loader -->

        <!-- Page Wrap -->
        <div class="page" id="top">        

            <section id="header">
                <?php echo View::make('front.pages.header') ?>
            </section>
            
            <section id="content">
                @yield('content') 
            </section>

            <section id="footer">
                <?php echo View::make('front.pages.footer') ?>
            </section>
        </div>
        @yield('scripts')
    </body>       
</html>