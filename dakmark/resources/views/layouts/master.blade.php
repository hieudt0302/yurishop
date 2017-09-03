<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/order.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/image.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/table.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/checkbox-radio.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/header.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/footer.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/product-info.css">
        <!-- <link rel="stylesheet" href="{{url('/')}}/public/assets/css/custom.css"> -->
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/spinner.css">
        <link rel="stylesheet" href="{{url('/')}}/public/assets/css/auth.css" type="text/css" media="all">
        
        <script src="{{url('/')}}/public/assets/js/jquery-1.12.4.js"></script>
        <script src="{{url('/')}}/public/assets/js/bootstrap.min.js"></script>
        

    </head>
    <body>
        <section id="header">
            <?php echo View::make('front.pages.header') ?>
        </section>
        
        <section id="content">
            @yield('content') 
        </section>

        <section id="footer">
            <?php echo View::make('front.pages.footer') ?>
        </section>
        @yield('scripts')
    </body>       
</html>