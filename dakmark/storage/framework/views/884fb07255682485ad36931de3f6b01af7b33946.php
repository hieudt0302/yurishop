 
<?php $__env->startSection('title', 'Đơn Hàng Cửa Hàng'); ?> <?php $__env->startSection('description', 'This is a blank description
that needs to be implemented'); ?> 
<?php $__env->startSection('pageheader', 'Đặt Hàng Theo Cửa Hàng'); ?> 
<?php $__env->startSection('pagedescription', 'Danh sách'); ?> <?php $__env->startSection('breadarea',
'Đơn Đặt Hàng'); ?> <?php $__env->startSection('breaditem', 'Cửa Hàng'); ?> <?php $__env->startSection('content'); ?>

<div class="row">
   <div class="col-xs-12">
       <!-- .box -->
       <div class="box box-danger">
           <div class="box-header with-border">
           <i class="fa fa-shopping-bag"></i>
               <h3 class="box-title">Bộ Lọc</h3>
           </div>
           <div class="box-body">
               <div class="row">
                   <?php echo Form::open(array('route' => 'admin.ordershops.find','method'=>'POST', 'class'=>'form-inline')); ?>

                   <div class="col-xs-2">
                       <div class="form-group">
                           <label for="customer">Cửa Hàng</label> <?php echo Form::text('shop', null, array('class' => 'form-control',
                           'id'=>'shop')); ?>

                       </div>
                   </div>
                   <div class="col-xs-2">
                       <div class="form-group">
                           <label for="fromDate">Mã Vận Đơn</label> <?php echo Form::text('landingcode', null, array('class' => 'form-control',
                           'id'=>'landingcode')); ?>

                       </div>
                   </div>
                   <div class="col-xs-2">
                       <div class="form-group">
                           <label for="status">Trạng Thái</label> <?php echo Form::select('status', array(0=>'Tất Cả', 1 => 'Chờ
                           xử lý', 2 => 'Đang xử lý', 3 => 'Hoàn Thành', 4 => 'Hủy'), 0, array('name' => 'status','type'=>'text',
                           'class'=>'form-control')); ?>

                       </div>
                   </div>
                   <div class="col-xs-4" style="display: inline-block;vertical-align: middle;float: none;">
                       <button type="submit" class="btn btn-info">Tìm Kiếm</button>
                   </div>
                   <?php echo Form::close(); ?>

               </div>
           </div>
           <!-- /.box-body -->
       </div>
       <!-- /.box -->
   </div>
</div>
<div class="row">
   <div class="col-xs-12">
       <div class="box">
           <div class="box-header">
               <h3 class="box-title">Đơn Hàng</h3>
           </div>
           <div class="box-body">
               <table id="order-table" class="table table-bordered">
                   <thead>
                       <tr>
                           <th>#</th>
                           <th>Tên Cửa Hàng</th>
                           <th>Mã Vận Đơn</th>
                           <th>Tổng Giá Đơn Hàng</th>
                           <th>Trạng Thái</th>
                           <th>Tùy chọn</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php $__currentLoopData = $ordershops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ordershop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>
                           <td><?php echo e(++$i); ?></td>
                           <td>
                               <?php echo e($ordershop->shop->name); ?>

                           </td>
                           <td>
                               <?php echo e($ordershop->landing_code); ?>

                           </td>
                           <td><?php echo e($ordershop->totalamount); ?> Tệ</td>
                           <td>
                               <?php if($ordershop->status===1): ?>
                               <span>Chờ xử lý</span> <?php elseif($ordershop->status===2): ?>
                               <span>Đang xử lý</span> <?php elseif($ordershop->status===3): ?>
                               <span>Hoàn thành</span> <?php elseif($ordershop->status===4): ?>
                               <span>Hủy</span> <?php else: ?>
                               <span>Không xác định!</span> <?php endif; ?>
                           </td>
                           <td >
                               <a href="<?php echo e(route('admin.ordershops.show', $ordershop->id)); ?>" class="btn btn-info btn-xs" title="Xem chi tiết">
                                                           <i class="fa fa-eye"></i> Xem chi tiết
                                                   </a> <?php if($ordershop->status===1): ?>
                               <a href="" class="btn btn-danger btn-xs" data-toggle="ajaxModal" title="Hủy bỏ">
                                                           <i class="fa fa-ban"></i> Hủy đơn hàng
                                                   </a> <?php endif; ?>
                           </td>
                       </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </tbody>
               </table>
               <?php if(!empty($shop) || !empty($landingcode) || !empty($status)): ?> 
               <?php echo $ordershops->appends(['shop' => $shop ])->appends(['landingcode'=> $landingcode ])->appends(['status' => $status])->render(); ?> 
               <?php else: ?> <?php echo $ordershops->render(); ?> <?php endif; ?>
           </div>

       </div>
   </div>
</div>
<?php $__env->stopSection(); ?> <?php $__env->startSection('scripts'); ?>

<!-- bootstrap datepicker -->
<script src="<?php echo e(url('/')); ?>/public/assets/js/datepicker/bootstrap-datepicker.min.js"></script>

<!-- DataTables -->
<script src="<?php echo e(url('/')); ?>/public/assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo e(url('/')); ?>/public/assets/js/datatables/dataTables.bootstrap.min.js"></script>


<script>
   $(document).ready(function () {
    $("#dasboard").removeClass("active");
        $("#order").addClass("active"); 
        $("#user").removeClass("active");
        $("#setting").removeClass("active");
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>