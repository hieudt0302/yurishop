  <?php $__env->startSection('title','Danh sách đơn hàng'); ?> <?php $__env->startSection('content'); ?>
<br>
<div class="container">
    <div class="row">
        <h1>Danh Sách Đơn Hàng</h1>
        <?php echo $__env->make('notifications.status_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
        <?php echo $__env->make('notifications.errors_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <div class="row">

        <?php echo Form::open(array('route' => 'front.orders.find','method'=>'POST', 'class'=>'form-inline')); ?>

        <div class="form-group">
            <label for="fromDate">Từ Ngày</label> <?php echo Form::text('fromDate', null, array('class' => 'form-control', 'id'=>'fromDate')); ?>

        </div>
        <span style="margin-left:20px"></span>
        <div class="form-group">
            <label for="toDate">Đến Ngày</label> <?php echo Form::text('toDate', null, array('class' => 'form-control', 'id'=>'toDate')); ?>

        </div>
        <span style="margin-left:20px"></span>
        <div class="form-group">
            <label for="status">Trạng Thái</label> <?php echo Form::select('status', array(0=>'Tất Cả', 1 => 'Chờ xử lý', 2 => 'Đang
            xử lý', 3 => 'Hoàn Thành', 4 => 'Hủy'), 0, array('name' => 'status','type'=>'text', 'class'=>'form-control')); ?>

        </div>
        <span style="margin-left:20px"></span>
        <button type="submit" class="btn btn-info">Tìm Kiếm</button> <?php echo Form::close(); ?>

    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="order-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Thời gian đặt hàng</th>
                        <th>Tổng giá trị đơn hàng</th>
                        <th>Tình trạng</th>
                        <th>Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(++$i); ?></td>
                        <td><?php echo e($order->created_at); ?></td>
                        <td><?php echo e($order->totalamount); ?> Tệ</td>
                        <td>
                            <?php if($order->status===1): ?>
                            <span>Chờ xử lý</span> <?php elseif($order->status===2): ?>
                            <span>Đang xử lý</span> <?php elseif($order->status===3): ?>
                            <span>Hoàn thành</span> <?php elseif($order->status===4): ?>
                            <span>Hủy</span> <?php else: ?>
                            <span>Không xác định!</span> <?php endif; ?>
                        </td>
                        <td class="order-option">
                            <a href="<?php echo e(route('front.orders.show', $order->id)); ?>" class="btn btn-info btn-xs" title="Xem chi tiết">
                                <i class="fa fa-eye"></i> Xem chi tiết
                        </a> <?php if($order->status===1): ?>
                            <a href="" class="btn btn-danger btn-xs" data-toggle="ajaxModal" title="Hủy bỏ">
                                <i class="fa fa-ban"></i> Hủy đơn hàng
                        </a> <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php if(!empty($fromDate) || !empty($toDate) || !empty($status)): ?> <?php echo $orders->appends(['from' => $fromDate ])->appends(['to'
            => $toDate ])->appends(['status' => $status])->render(); ?> <?php else: ?> <?php echo $orders->render(); ?> <?php endif; ?>
        </div>
    </div>
</div>
<br>

<script src="<?php echo e(url('/')); ?>/public/assets/js/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function () {
        $('#fromDate, #toDate').datepicker({
            autoclose: true,
            todayHighlight: true,
            orientation: 'bottom',
            format: 'yyyy-mm-dd',
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>