<?php $__env->startSection('title','Đặt hàng'); ?>
<?php $__env->startSection('content'); ?>

<div>Thời gian load trang : <?php echo e($load_time); ?></div>

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

            <input type="text" class="input-link" name="product_url" value="<?php echo e($product_url); ?>">
            <button class="btn-get-info" type="submit">Lấy thông tin sản phẩm</button>
            <input type="hidden" id="link-hidden" value="">
        <?php echo Form::close(); ?>

    </div>
</div>  
<!--
<div id="loading" style="display: none">
    <img src="<?php echo e(url('/')); ?>/public/assets/img/loading.gif" alt="Loading..." />
</div>
-->
<div class="row" id="product-info">
    <input type="hidden" name="sizes" value="<?php echo e(serialize($sizes)); ?>">
    <input type="hidden" name="skuMap" value="<?php echo e(serialize($skuMap)); ?>">
	<input type="hidden" name="first" value="<?php echo e($first); ?>">
    <div class="col-md-4 product-img">
        <img class="img-responsive image" src="<?php echo e($image); ?>" alt="Hình sản phẩm" />
    </div>
    <div class="col-md-8">
        <div class="product-name">
            <?php echo e($name); ?>

        </div>
        <div class="shop-box">
            <div class="col-md-2 detail-label">Cửa hàng</div>
            <div class="col-md-10 shop-name"><?php echo e($shop_name); ?></div>
        </div>    
        <div class="price-box">
            <div class="col-md-2 detail-label">Giá sản phẩm</div>
            <div class="col-md-10">
                <span class="cur-price"><?php echo e($current_price); ?></span>
                <?php if($origin_price): ?>
                <span class="org-price"><?php echo e($origin_price); ?></span>
                <?php endif; ?>
            </div>
        </div>

        <?php if(!empty($colors) AND !empty($sizes)): ?>
        <div class="color-box">
            <div class="col-md-2 detail-label">Màu sắc</div>
            <div class="col-md-10">
                <ul class='color'>
                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="single-color <?php echo $key==0 ? 'li-selected' : ''; ?>"
                        data-value="<?php echo e($c['colorId']); ?>" data-title="<?php echo e($c['colorName']); ?>">
                        <a href="javascript:;" title="<?php echo e($c['colorName']); ?>">
                            <img src="<?php echo e($c['colorImg']); ?>" alt="<?php echo e($c['colorName']); ?>">
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="size-box">
            <div class="col-md-2 detail-label">Kích cỡ</div>
            <div class="col-md-10">
                <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="size">
                    <span class="size-name"><?php echo e($s['sizeName']); ?></span>
                    <span class="size-price"><?php echo e($s['sizePrice']); ?></span>
                    <span class="size-quantity">Còn <span class="quantity" data-key="size_<?php echo e($key); ?>"><?php echo e($s['sizeQuantity']); ?></span></span>
                    <span>
                        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="size_<?php echo e($key); ?>" disabled>
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        <input type="text" class="form-control input-number" name="size_<?php echo e($key); ?>" value="0" min="0">
                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="size_<?php echo e($key); ?>">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </span>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <?php elseif(!empty($colors)): ?>
        <div class="size-box">
            <div class="col-md-2 detail-label">Màu sắc</div>
            <div class="col-md-10">
                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="size">
                    <span class="size-name">
                        <?php if($c['colorImg'] != ''): ?>
                        <img src="<?php echo e($c['colorImg']); ?>" alt="<?php echo e($c['colorName']); ?>">
                        <?php endif; ?>
                        <?php echo e($c['colorName']); ?>

                    </span>
                    <span class="size-price"><?php echo e($c['colorPrice']); ?></span>
                    <span class="size-quantity">Còn <?php echo e($c['colorQuantity']); ?></span>
                    <span>
                        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="size_<?php echo e($key); ?>" disabled>
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        <input type="text" class="form-control input-number" name="size_<?php echo e($key); ?>" value="0" min="0">
                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="size_<?php echo e($key); ?>">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </span>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <?php elseif(!empty($sizes)): ?>
        <div class="size-box">
            <div class="col-md-2 detail-label">Kích cỡ</div>
            <div class="col-md-10">
                <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="size">
                    <span class="size-name"><?php echo e($s['sizeName']); ?></span>
                    <span class="size-price"><?php echo e($s['sizePrice']); ?></span>
                    <span class="size-quantity">Còn <?php echo e($s['sizeQuantity']); ?></span>
                    <span>
                        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="size_<?php echo e($key); ?>" disabled>
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        <input type="text" class="form-control input-number" name="size_<?php echo e($key); ?>" value="0" min="0">
                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="size_<?php echo e($key); ?>">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </span>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="pay-box">
            <div>
                <span class="pay-label">Số sản phẩm đã chọn</span>
                <span class="total-quantity">3</span>
            </div>
            <div>
                <span class="pay-label">Số tiền phải thanh toán</span>
                <span class="total-amount">360.00 tệ</span>
            </div>
        </div>
        <div>
            <button class="btn btn-primary add-shoopingcart">Thêm vào giỏ hàng</button>
            <!-- <form action="<?php echo e(url('/cart/create')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" id="productname" name="productname" value="true">
                        <input type="hidden" id="quantity" name="quantity" value="0">
                        <input type="hidden" id="unitprice" name="shipaddress">
                        <input type="hidden" id="color" name="color">
                        <input type="hidden" id="colorimage" name="colorimage">
                        <input type="hidden" id="size" name="size">
                        <input type="hidden" id="url" name="url">
                        <input type="hidden" id="image" name="image">
                         <button type="submit" class="btn-lg btn-primary">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Thêm vào giỏ hàng
                        </button>
                    </form> -->
        </div>
    </div>
</div>
<div class="row product-des">
    <h4>CHI TIẾT SẢN PHẨM</h4>
    <div class="description">
    <?php if(!empty($description)): ?>
        <?php $__currentLoopData = $description; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
            <?php echo e($d); ?>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    </div>
</div>
<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".quantity").each(function(index){
            if($(this).html()==0){
                //console.log(name + " = 0");
                //$(".btn-number").eq(index).attr('disabled', true);
                $(".input-number").eq(index).readOnly;
            }
        });
        $('ul.color li').click(function() {
            $('ul.color li').removeClass('li-selected');
            $(this).addClass('li-selected');
            
            var colorId = $(this).attr("data-value");
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo e(url('/get-prop')); ?>" ,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    sizes: $("input[name='sizes']").val(),
                    skuMap: $("input[name='skuMap']").val(),
					first: $("input[name='first']").val(),
                    colorId: colorId,
                },
                success: function(res){
                    $(".size-price").each(function(index){
                        $(this).html(res[index].sizePrice);
                    });
                    $(".quantity").each(function(index){
                        $(this).html(res[index].sizeQuantity);
                        if($(this).html()==0){
                            //console.log(name + " = 0");
                            //$(".btn-number").eq(index).attr('disabled', true);
                            $(".input-number").eq(index).attr('disabled', true);
                        }
                    });
                }
            });
            
        });
        $('.btn-number').click(function(e){
            e.preventDefault();
            fieldName = $(this).attr('data-field');
            type      = $(this).attr('data-type');
            var input = $("input[name='"+fieldName+"']");
            var currentVal = parseInt(input.val());
            if(!isNaN(currentVal)) {
                if(type == 'minus') {           
                    if(currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    } 
                    if(parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }
                }
                else if(type == 'plus') {
                    input.val(currentVal + 1).change();
                }
            } 
            else {
                input.val(0);
            }
        });
        $('.input-number').change(function() {   
            minValue =  parseInt($(this).attr('min'));
            valueCurrent = parseInt($(this).val());
            name = $(this).attr('name');
            if(valueCurrent > minValue) {
                $(".btn-number[data-field='"+name+"']").removeAttr('disabled')
            } 
        });

        $('.add-shoopingcart').click(function() {

            var sizes = new Array();
            $(".size").each(function(index){
                var sizeName = $(".size-name").eq(index).text();
                var sizePrice = $(".size-price").eq(index).html();
                var amount = $(".input-number").eq(index).val();
                sizes.push({"sizeName":sizeName, "sizePrice":sizePrice, "amount":amount});
            });
            var link = $(".input-link").val();
            var name = $(".product-name").html();
            var shop = $(".shop-name").html();
            var image = $(".image").attr("src");
            var color = $(".li-selected").attr("data-title");
            var colorImg = $(".li-selected img").attr("src");

            $.ajax({
                type: "POST",
                url: '<?php echo e(url("/cart/create")); ?>',
                data: {
                    'productName': name,
                    'image': image,
                    'url': link,
                    'color': color,
                    'colorImage': colorImg,
                    'shop': shop,
                    'sizes': sizes,
                },
                success: function(data) {
                
                    window.location.href= '<?php echo e(url('/cart ')); ?>';
                },
                error: function (data) {
                    alert(data);
                }
            });
        });
    });
</script>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>