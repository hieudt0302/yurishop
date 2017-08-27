<?php $__env->startSection('title', 'Danh mục sản phẩm'); ?>
<?php $__env->startSection('description', 'Danh mục sản phẩm'); ?>
<?php $__env->startSection('content'); ?>
<header class="header">
    <a href="<?php echo e(route('admin.product-cat.add')); ?>" class="btn btn-primary btn-add" title="Thêm danh mục mới">
        <i class="fa fa-plus"></i>
        Thêm danh mục mới
    </a>
</header>
<div class="container">
    <div class="row">
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
                                onclick="return confirm('Bạn muốn xóa danh mục này ?');">
                                <i class="fa fa-trash"></i>Xóa
                            </a>
                        </td>
                    </tr>
                   
                        <?php if(App\Models\ProductCat::hasChildCat($pCat->id)): ?>
                            <?php $__currentLoopData = App\Models\ProductCat::getChildCat($pCat->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <i class="fa fa-minus-square-o"></i>
                                <?php echo e($childCat->name); ?>

                            </td>
                            <td>
                                <i class="fa <?php echo ($childCat->is_show==1) ? 'fa-check' : 'fa-times'; ?>"></i>
                            </td>
                             <td>
                                <i class="fa <?php echo ($childCat->is_show_nav==1) ? 'fa-check' : 'fa-times'; ?>"></i>
                            </td>
                            <td><?php echo e($childCat->sort_order); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.product-cat.edit',$childCat->id)); ?>" class="btn btn-default btn-xs" title="Chỉnh sửa">
                                    <i class="fa fa-pencil"></i>Sửa 
                                </a>
                                <a href="<?php echo e(route('admin.product-cat.delete',$childCat->id)); ?>" class="btn btn-default btn-xs" title="Xóa" 
                                   onclick="return confirm('Bạn muốn xóa danh mục này ?');">
                                    <i class="fa fa-trash"></i>Xóa
                                </a>
                            </td>
                        </tr>
                                <?php if(App\Models\ProductCat::hasChildCat($childCat->id)): ?>
                                    <?php $__currentLoopData = App\Models\ProductCat::getChildCat($childCat->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCat2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>{ 
                            <tr>
                                <td>
                                    <i class="fa fa-minus-square-o"></i>
                                    <?php echo e($childCat2->name); ?>

                                </td>
                                <td>
                                    <i class="fa <?php echo ($childCat2->is_show==1) ? 'fa-check' : 'fa-times'; ?>"></i>
                                </td>
                                <td>
                                    <i class="fa <?php echo ($childCat2->is_show_nav==1) ? 'fa-check' : 'fa-times'; ?>"></i>
                                </td>
                                <td><?php echo e($childCat2->sort_order); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.product-cat.edit',$childCat2->id)); ?>" class="btn btn-default btn-xs" title="Chỉnh sửa">
                                        <i class="fa fa-pencil"></i>Sửa 
                                    </a>
                                    <a href="<?php echo e(route('admin.product-cat.delete',$childCat2->id)); ?>" class="btn btn-default btn-xs" title="Xóa" 
                                       onclick="return confirm('Bạn muốn xóa danh mục này ?');">
                                        <i class="fa fa-trash"></i>Xóa
                                    </a>
                                </td>
                            </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>        
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>