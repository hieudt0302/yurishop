<?php $__env->startSection('title', 'Danh mục sản phẩm'); ?>
<?php $__env->startSection('description', 'Danh mục sản phẩm'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <a href="<?php echo e(route('admin.product-cat.add')); ?>" class="btn btn-primary" title="Thêm danh mục mới">
            <i class="fa fa-plus"></i>Thêm danh mục mới
        </a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="order-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Hiển thị</th>
                        <th>Hiển thị trên menu</th>
                        <th>Sắp xếp</th>
                        <th>Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>10-06-2017 10:00</td>
                        <td>Donald Trump</td>
                        <td><?php echo e(price_format(2000000,'VNĐ')); ?></td>
                        <td>Hoàn thành</td>
                        <td class="order-option">
                            <a href="<?php echo e(route('admin.orders.details')); ?>" class="btn btn-default btn-xs" title="Xem chi tiết">
                                <i class="fa fa-eye"></i>Xem chi tiết
                            </a>
                            <a href="" class="btn btn-default btn-xs" data-toggle="ajaxModal" title="Hủy bỏ">
                                <i class="fa fa-ban"></i>Hủy đơn hàng
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>15-06-2017 8:00</td>
                        <td>Tập Cận Bình</td>
                        <td>2.300.000</td>
                        <td>Đã hủy</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>10-07-2017 10:30</td>
                        <td>Shinzo Abe</td>
                        <td>3.000.000</td>
                        <td>Chờ xử lý</td>
                        <td></td>
                    </tr>
                </tbody>        
            </table>
        </div>
    </div>
</div>
<script src="<?php echo e(url('/')); ?>/public/assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo e(url('/')); ?>/public/assets/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo e(url('/')); ?>/public/assets/js/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function(){
        $('#begin-date, #end-date').datepicker({
            autoclose: true,
            todayHighlight:true,
            orientation:'bottom',
        });
        $('#order-table').DataTable({ 
            "lengthChange": false,
            "filter": false
        });
    });
</script>   

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>