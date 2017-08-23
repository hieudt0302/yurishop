<?php $__env->startSection('title', 'Danh mục sản phẩm'); ?>
<?php $__env->startSection('description', 'Danh mục sản phẩm'); ?>
<?php $__env->startSection('content'); ?>
<header class="header">
    <a href="<?php echo e(route('admin.product-cat.add')); ?>" class="btn btn-primary btn-sm pull-right" title="Thêm danh mục mới">
        <i class="fa fa-plus"></i>
        Thêm danh mục mới
    </a>
</header>
<div class="container">
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
                    <?php $__currentLoopData = $productCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($pCat->name); ?></td>
                        <td>
                            <i class="fa <?php echo ($pCat->is_show==1) ? 'fa-check' : 'fa-times'; ?>"></i>
                        </td>
                        <td>
                            <i class="fa <?php echo ($pCat->is_show_nav==1) ? 'fa-check' : 'fa-times'; ?>"></i>
                        </td>
                        <td><?php echo e($pCat->sort_order); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.product-cat.edit',$pCat->id)); ?>" class="btn btn-default btn-xs" title="Chỉnh sửa">
                                <i class="fa fa-pencil"></i>Sửa 
                            </a>
                            <a href="<?php echo e(route('admin.product-cat.delete',$pCat->id)); ?>" class="btn btn-default btn-xs" title="Xóa" 
                                onclick="return confirm(\'Bạn muốn xóa danh mục này ?\')">
                                <i class="fa fa-trash"></i>Xóa
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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