 <?php $__env->startSection('title','Tạo Đơn Hàng'); ?> <?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="row">
        <h1 style="color:#d9534f;">
            <span class="glyphicon glyphicon-send" aria-hidden="true"></span> Đặt Hàng
        </h1>
        <h4>Điền vào các mục dưới đây để hoàn thành đơn đặt hàng của bạn !</h4>
        <?php echo $__env->make('notifications.status_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
		<?php echo $__env->make('notifications.errors_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-4">
            <div class="bs-example bs-order-ship">
                <form>
                    <div class="form-group">
                        <label for="bookaddress">Chọn từ sổ địa chỉ</label>
                        <?php if(sizeof($bookaddress) <= 0): ?>
                        <select id="bookaddress" disabled name="bookaddress" type="text" class="form-control">
                            <option value="0">----- Bạn chưa thêm địa chỉ nào trong sổ -----</option>
                        </select>
                        <?php else: ?>
                        <select id="bookaddress" name="bookaddress" type="text" class="form-control">
                            <option value="0">----- Vui lòng chọn một địa chỉ -----</option>
                            <?php $__currentLoopData = $bookaddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $add): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($add->id); ?>"><?php echo e($add->last_name); ?> <?php echo e($add->first_name); ?> - <?php echo e($add->address); ?>, <?php echo e($add->district); ?>, <?php echo e($add->city); ?> - <?php echo e($add->phone); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php endif; ?>
                    </div>
                    <div class="checkbox checkbox-warning">
                        <input id="changeaddress" type="checkbox">
                        <label for="changeaddress">Sử dụng địa chỉ khác</label>
                    </div>
                    <div class="collapse">
                        <div class="form-group">
                            <label for="address">Địa Chỉ (*)</label>
                            <input type="text" class="form-control" id="address" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="district">Quận/Huyện (*)</label>
                            <input type="text" class="form-control" id="district" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="city">Tỉnh/Thành Phố (*)</label>
                            <input type="text" class="form-control" id="city" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số Điện Thoại (*)</label>
                            <input type="text" class="form-control" id="phone" placeholder="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xs-8">
            <div class="bs-example bs-order-check">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-left">Tên Sản Phẩm</th>
                                <th class="text-right">Kích Cỡ</th>
                                <th class="text-right">Màu</th>
                                <th class="text-right">Số Lượng</th>
                                <th class="text-right last">Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-left"><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->options->color); ?></td>
                                <td><?php echo e($item->options->size); ?></td>
                                <td class="text-right"><?php echo e($item->qty); ?></td>
                                <td class="text-right last" style="color:#bf9a61"><?php echo e($item->subtotal); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>

                            <tr>
                                <td style="" class="text-right" colspan="4">
                                    Thành tiền </td>
                                <td style="color:#bf9a61" class="text-right last">
                                    <span class="price"><?php echo e(Cart::total()); ?>&nbsp;tệ</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="" class="text-right" colspan="4">
                                    <strong>Tổng Số Tiền (tạm tính)</strong>
                                </td>
                                <td style="" class="text-right last">
                                    <strong><span class="price">49.000&nbsp;VNĐ</span></strong>
                                </td>
                            </tr>

                        </tfoot>
                    </table>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="note">Ghi Chú</label>
                            <input id="note" type="text" class="form-control" placeholder="Ghi chú khác...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <!-- <button id="send-order" type="submit" class="btn-lg btn-primary">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  
                    </button> -->
                    <form action="<?php echo e(url('/order/create')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" id="use_bookaddress" name="use_bookaddress" value="true">
                        <input type="hidden" id="bookaddress_id" name="bookaddress_id" value="0">
                        <input type="hidden" id="shipaddress" name="shipaddress">
                        <input type="hidden" id="shipdistrict" name="shipdistrict">
                        <input type="hidden" id="shipcity" name="shipcity">
                        <input type="hidden" id="shipphone" name="shipphone">
                        <input type="hidden" id="ordernote" name="ordernote">
                         <button type="submit" class="btn-lg btn-primary">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Gửi Đơn Hàng
                        </button>
                    </form>
                    <h6 style="color:#d9534f;">
                        Lưu ý: Chúng tôi sẽ kiểm tra đơn hàng và liên hệ để xác nhận với bạn!
                    </h6>
                </div>
            </div>

        </div>
    </div>
</div>
<br> <?php $__env->stopSection(); ?> <?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $("#changeaddress").click(function() {
            $('#bookaddress').attr("disabled", $(this).is(":checked"));
            
            $(".collapse").collapse('toggle');
            if($(this).is(":checked")){
                $('#use_bookaddress').val('false');
            }
            else{
                $('#use_bookaddress').val('true');
            }
        });

        $('#bookaddress').on('change', function() {
            var id = this.value;
            $('#bookaddress_id').val(id);
        });

        $('#address').on('input', function() {
            var address = this.value;
            $('#shipaddress').val(address);
        });

        $('#district').on('input', function() {
            var district = this.value;
            $('#shipdistrict').val(district);
        });

        $('#city').on('input', function() {
            var city = this.value;
            $('#shipcity').val(city);
        });

        $('#phone').on('input', function() {
            var phone = this.value;
            $('#shipphone').val(phone);
        });

        $('#note').on('input', function() {
            var note = this.value;
            $('#ordernote').val(note);
        });
      
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>