<?php $__env->startSection('title','Đặt hàng'); ?>
<?php $__env->startSection('content'); ?>

<div class="order-info-address">
    <div class="address">
        <span>Địa chỉ nhận hàng: </span>Thang Le Duc, SĐT: 0935334983, 
         ----       
        <a class="edit-info-address" href="javascript:;" data-reveal-id="edit-info-address" id="edit-order-address">Sửa địa chỉ nhận hàng</a>
    </div>
</div>
<div class="order-float-bar-block" id="order-bar">
    <div class="tab-btn block-get-info" data-tab="tab-product-info">
        <?php echo Form::open(['url' => '/thong-tin-san-pham']); ?>

            <input type="text" class="input-link" id="product-link" name="product_url" autofocus="true">
            <button class="btn-get-info" type="submit">Lấy thông tin sản phẩm</button>
            <input type="hidden" id="link-hidden" value="">
        <?php echo Form::close(); ?>

        <?php if(count($errors) > 0): ?>
        <div class="input-error">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div><?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>
</div>  

<!--
<div id="loading" style="display: none">
    <img src="<?php echo e(url('/')); ?>/public/assets/img/loading.gif" alt="Loading..." />
</div>
-->

<div id="null-shop" class="null-shop">
    Chưa có sản phẩm nào trong đơn hàng
</div>
<script>
    $(document).ready(function(){

    });
</script>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>