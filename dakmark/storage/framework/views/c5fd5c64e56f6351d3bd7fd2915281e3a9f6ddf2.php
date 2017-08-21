 
<?php $__env->startSection('content'); ?>
  
        <div >
            <div>
                <h1 id="homeHeading">404</h1>
                <h2>Nội dung không được tìm thấy!</h2>
                <hr>
                <?php echo $__env->make('notifications.status_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('notifications.errors_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <p>Xin lỗi, nội dung bạn tìm kiếm không có. Bạn có thể quay về
                <a href="<?php echo e(url('/')); ?>" >Trang chủ</a> hoặc 
                <a href="<?php echo e(url('/login')); ?>" >đăng nhập</a> hoặc 
                <a href="<?php echo e(url('/register')); ?>">đăng ký một tài khoản</a> </p>
            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>