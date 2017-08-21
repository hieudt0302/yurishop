 <?php $__env->startSection('title'); ?> <?php echo app('translator')->getFromJson('auth.login'); ?> <?php $__env->stopSection(); ?> <?php $__env->startSection('description', 'Login to the admin
area'); ?> <?php $__env->startSection('content'); ?>
<br>
<div class="container">
	<div class="card-container text-center">
		<div class="title"><?php echo app('translator')->getFromJson('auth.login'); ?></div>
		<div class="subtitle"><?php echo app('translator')->getFromJson('auth.login_label'); ?></div>
		<?php echo $__env->make('notifications.status_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
		<?php echo $__env->make('notifications.errors_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
	<div class="card card-container">
		<!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
		<img id="profile-img" class="profile-img-card" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" />
		<p id="profile-name" class="profile-name-card"></p>
		<form class="form-signin" method="POST" action="<?php echo e(url('/login')); ?>" data-parsley-validate="">
			<?php echo e(csrf_field()); ?>

			<input type="text" id="username" name="username" class="form-control" placeholder="Tên tài khoản" value="<?php echo e(old('username')); ?>"
			    required autofocus data-parsley-required-message="Yêu cầu nhập tên tài khoản" data-parsley-trigger="change focusout" data-parsley-minlength="5"
			    data-parsley-maxlength="20"> <?php if($errors->has('username')): ?>
			<span class="help-block">
						<strong><?php echo e($errors->first('username')); ?></strong>
					</span> <?php endif; ?>
			<input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu" required data-parsley-required-message="Yêu cầu nhập mật khẩu"
			    data-parsley-trigger="change focusout" data-parsley-minlength="5" data-parsley-maxlength="32"> <?php if($errors->has('password')): ?>
			<span class="help-block">
						<strong><?php echo e($errors->first('password')); ?></strong>
					</span> <?php endif; ?>
			<div id="remember" class="checkbox">
				<label>
                        <input type="checkbox" value="remember-me" name="remember"> <?php echo app('translator')->getFromJson('auth.rememberme'); ?>
                    </label>
			</div>
			<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit"><?php echo app('translator')->getFromJson('auth.signin'); ?></button>
		</form>
		<!-- /form -->
		<a href="<?php echo e(url('/password/reset')); ?>" class="forgot-password"><?php echo app('translator')->getFromJson('auth.forgotpassword'); ?></a> hoặc <a href="<?php echo e(url('/username/reminder')); ?>"
		    class="forgot-password"><?php echo app('translator')->getFromJson('auth.forgotusername'); ?></a>
	</div>
	<!-- /card-container -->
	<div class="card-container text-center">
		<a href="<?php echo e(url('/register')); ?>" class="new-account"><?php echo app('translator')->getFromJson('auth.createaccount'); ?></a> hoặc <a href="<?php echo e(url('/activation/resend')); ?>"
		    class="new-account"><?php echo app('translator')->getFromJson('auth.resendactivationcode'); ?></a>
	</div>
</div>
<!-- /container -->
<br> <?php $__env->stopSection(); ?> 
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(url('/')); ?>/public/assets/js/plugins/parsley/parsley.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>