<?php $__env->startSection('title','Cà phê Đak Hà - Trang chủ'); ?>
<?php $__env->startSection('content'); ?>

    <link  href="<?php echo e(url('/')); ?>/public/assets/css/coreSlider.css" rel="stylesheet" type="text/css">
    <script src="<?php echo e(url('/')); ?>/public/assets/js/coreSlider.js"></script>
    <script>
    $('#example1').coreSlider({
      pauseOnHover: false,
      interval: 3000,
      controlNavEnabled: true
    });

    </script>

</div>  
<!--banner-->

    <!--content-->
<div class="content">
     <!--new-arrivals-->
        <div class="new-arrivals-w3agile">
            <div class="container">
                <h2 class="tittle"><?php echo app('translator')->getFromJson('home.new-products'); ?></h2>
                <div class="arrivals-grids equalheight">
                    <?php $__currentLoopData = $new_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 arrival-grid simpleCart_shelfItem columns">
                        <div class="grid-arr">
                            <div  class="grid-arrival">
                                <figure>        
                                    <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                        <div class="grid-img">
                                            <img  src="<?php echo e(asset('public/assets/img/product/' . $product->thumb)); ?>" class="img-responsive"  alt="">
                                        </div>          
                                    </a>        
                                </figure>   
                            </div>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="women">
                                <h6><a href="single.html"><?php echo e($product->name); ?></a></h6>
                                <div class="price">
                                   <?php if($product->is_promote == 1): ?>
                                    <p ><del><?php echo price_format($product->default_price,'VNĐ'); ?></del>
                                    <em class="item_price"><?php echo price_format($product->promote_price,'VNĐ'); ?></em></p>
                                    <?php else: ?>
                                   <span class="cur-price"><?php echo price_format($product->default_price,'VNĐ'); ?></span>
                                    <?php endif; ?>
                                </div>
                                <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <!--new-arrivals-->
    <!--best-sellers-->
        <div class="best-sellers-w3agile">
            <div class="container">
                <h2 class="tittle"><?php echo app('translator')->getFromJson('home.best-sellers'); ?></h2>
                <div class="arrivals-grids">
                    <?php $__currentLoopData = $best_sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                        <div class="grid-arr">
                            <div  class="grid-arrival">
                                <figure>        
                                    <a href="" class="product-url">
                                        <div class="grid-img">
                                            <img  src="<?php echo e(asset('public/assets/img/product/' . $product->thumb)); ?>" class="img-responsive"  alt="">
                                        </div>          
                                    </a>        
                                </figure>   
                            </div>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="women">
                                <h6><a href="single.html"><?php echo e($product->name); ?></a></h6>
                             <div class="price">
                                   <?php if($product->is_promote == 1): ?>
                                    <p ><del><?php echo price_format($product->default_price,'VNĐ'); ?></del>
                                    <em class="item_price"><?php echo price_format($product->promote_price,'VNĐ'); ?></em></p>
                                    <?php else: ?>
                                   <span class="cur-price"><?php echo price_format($product->default_price,'VNĐ'); ?></span>
                                    <?php endif; ?>
                                </div>
                                <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <!--best-sellers-->
    <!--our-blogs-->
        <div class="our-blogs-w3agile">
            <div class="container">
                <h2 class="tittle"><?php echo app('translator')->getFromJson('home.our-blogs'); ?></h2>
                <div class="arrivals-grids">
                    <?php $__currentLoopData = $new_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 arrival-grid simpleCart_shelfItem">
                        <div class="grid-arr">
                            <div  class="grid-arrival">
                                <figure>        
                                    <a href="" class="product-url">
                                        <div class="grid-img-blog">
                                            <img  src="<?php echo e(asset('public/assets/img/blog/' . $blog->thumb)); ?>" class="img-responsive"  alt="">
                                        </div>          
                                    </a>        
                                </figure>   
                            </div>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="women">
                                <h6><a href="single.html"><?php echo e($blog->title); ?></a></h6>
                                 <div class="price">
                                    <?php echo e(str_limit($blog->introduce, $limit = 120, $end = '...')); ?>

                                </div>
                                <a href="#" data-text="View more" class="my-cart-b item_add"><?php echo app('translator')->getFromJson('common.more-details'); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <!--our-blogs-->  
</div>
<!--content-->

<script>
    $(document).ready(function(){

    });
</script>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>