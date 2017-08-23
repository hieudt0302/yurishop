 <?php $__env->startSection('content'); ?>
<hr>
<div class="container">
    <div class="row">
        <h1 style="color:#d9534f;">
            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Giỏ Hàng
        </h1>

        <?php echo $__env->make('notifications.status_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
		<?php echo $__env->make('notifications.errors_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php if(session()->has('success_message')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('success_message')); ?>

            </div>
        <?php endif; ?>
        <?php if(session()->has('error_message')): ?>
            <div class="alert alert-danger">
                <?php echo e(session()->get('error_message')); ?>

            </div>
        <?php endif; ?>
    </div>
    <br> 
    <?php if(sizeof(Cart::content()) > 0): ?>
    <div class="row">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Hình Ảnh</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Màu</th>
                    <th>Size</th>
                    <th>Số Lượng</th>
                    <th>Giá Tiền</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <a href="<?php echo e($item->options->url); ?>" target="_blank">
                            <img src="<?php echo e($item->options->image); ?>" alt="" class="img-rounded img-inside">
                        </a>
                    </td>
                    <td><?php echo e($item->name); ?></td>
                    <td><?php echo e($item->options->color); ?></td>
                    <td><?php echo e($item->options->size); ?></td>
                    <td>
                        <div class="input-group spinner" style="width: 120px">
                            <input type="text" class="form-control quantity" data-id="<?php echo e($item->rowId); ?>" value="<?php echo e($item->qty); ?>" min="0" max="100000">
                            <div class="input-group-btn-vertical">
                                <button class="btn btn-default ajust-quantity" type="button"><i class="fa fa-caret-up"></i></button>
                                <button class="btn btn-default ajust-quantity" type="button"><i class="fa fa-caret-down"></i></button>
                            </div>
                        </div>
                    </td>
                    <td><?php echo e($item->subtotal); ?></td>
                    <td>
                        <form action="<?php echo e(url('cart', [$item->rowId])); ?>" method="POST" class="side-by-side">
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class="btn btn-danger btn-sm" value="Xóa">
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="7">

                    </td>
                    <tr/>
            </tbody>
        </table>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-6 text-left">
            <button type="submit" class="btn btn-info">
                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Xem Thêm 
                    </button>
        </div>
        <div class="col-xs-6 text-right">
            <form action="<?php echo e(url('/emptyCart')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn" value="Xóa Hết Giỏ Hàng">
            </form>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-xs-6"></div>
        <div class="col-xs-6 bs-example bs-cart">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="total" class="col-sm-8 control-label text-right">TỔNG SỐ TIỀN</label>
                    <div class="col-sm-4 text-right">
                        <label for="total" class="control-label"><?php echo e(Cart::total()); ?> Tệ</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10 text-right">
                        <a type="button" class="btn-lg btn-primary" href="<?php echo e(url('/order/create')); ?>"><span class="glyphicon glyphicon-ok"></span> Đặt Hàng</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php else: ?> 
  
    <?php endif; ?>
    <div class="row">
        <h3><?php echo app('translator')->getFromJson('shoppings.cart_noitems'); ?></h3>
        <div>
            <?php echo Form::open(['method' => 'POST','route' => ['front.carts.store'],'style'=>'display:inline']); ?> <?php echo e(Form::button('
                <span class="glyphicon glyphicon-education"></span> ADD DEMO ITEM', array('type' => 'submit', 'class' => 'btn btn-warning'))); ?> <?php echo Form::close(); ?>

        </div>
    </div>
</div>
<br> <?php $__env->stopSection(); ?> <?php $__env->startSection('scripts'); ?>
<!-- <script src="<?php echo e(url('/')); ?>/public/assets/js/spinner.js"></script> -->

<script>
    (function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.spinner .btn:first-of-type').on('click', function() {
            var btn = $(this);
            var input = btn.closest('.spinner').find('input');
            if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
                input.val(parseInt(input.val(), 10) + 1);
                //update cart
                var id = input.attr('data-id');
                $.ajax({
                    type: "PATCH",
                    url: '<?php echo e(url("/cart")); ?>' + '/' + id,
                    data: {
                        'quantity': input.val(),
                    },
                    success: function(data) {
                        window.location.href = '<?php echo e(url('/cart')); ?>';
                    },
                    error:function(){
                        alert('error');
                    }
                });
                //end update cart
            } else {
                btn.next("disabled", true);
            }
        });

        $('.spinner .btn:last-of-type').on('click', function() {
            var btn = $(this);
            var input = btn.closest('.spinner').find('input');
            if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
                input.val(parseInt(input.val(), 10) - 1);
                //update cart
                var id = input.attr('data-id');
                $.ajax({
                    type: "PATCH",
                    url: '<?php echo e(url("/cart")); ?>' + '/' + id,
                    data: {
                        'quantity': input.val(),
                    },
                    success: function(data) {
                        window.location.href = '<?php echo e(url('/cart')); ?>';
                    },
                    error:function(){
                        alert('error');
                    }
                });
                //end update cart
            } else {
                btn.prev("disabled", true);
            }
        });


        $('.quantity').on('input', function() {
            var id = $(this).attr('data-id')
            $.ajax({
                type: "PATCH",
                url: '<?php echo e(url("/cart")); ?>' + '/' + id,
                data: {
                    'quantity': this.value,
                },
                success: function(data) {
                    window.location.href = '<?php echo e(url('/cart ')); ?>';
                },
                error:function(){
                    alert('error');
                }
            });
        });
    })();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>