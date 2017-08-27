<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo $__env->yieldContent('title'); ?></title>
<<<<<<< HEAD
        
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/order.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/image.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/table.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/checkbox-radio.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/header.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/footer.css">
		<link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/product-info.css">
        <!-- <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/custom.css"> -->
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/spinner.css">
		<link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/auth.css" type="text/css" media="all">
		
        <script src="<?php echo e(url('/')); ?>/assets/js/jquery-1.12.4.js"></script>
        <script src="<?php echo e(url('/')); ?>/assets/js/bootstrap.min.js"></script>
        
        
=======
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/assets/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/assets/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/assets/css/order.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/assets/css/image.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/assets/css/table.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/assets/css/checkbox-radio.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/assets/css/header.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/assets/css/footer.css">
		<link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/assets/css/product-info.css">
        <!-- <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/assets/css/custom.css"> -->
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/assets/css/spinner.css">
		<link rel="stylesheet" href="<?php echo e(url('/')); ?>/public/assets/css/auth.css" type="text/css" media="all">
        <script src="<?php echo e(url('/')); ?>/public/assets/js/jquery-1.12.4.js"></script>
        <script src="<?php echo e(url('/')); ?>/public/assets/js/bootstrap.min.js"></script>
>>>>>>> 3425852b3e12566ea633bcafd90319db26655cf5
    </head>
    <body>
        <section id="header">
            <?php echo View::make('front.pages.header') ?>
        </section>
        
        <section id="content">
            <?php echo $__env->yieldContent('content'); ?> 
        </section>

        <section id="footer">
            <?php echo View::make('front.pages.footer') ?>
        </section>
        <?php echo $__env->yieldContent('scripts'); ?>
    </body>       
</html>
