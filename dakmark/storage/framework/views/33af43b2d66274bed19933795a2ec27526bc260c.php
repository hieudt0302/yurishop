 <?php $__env->startSection('title'); ?> <?php echo app('translator')->getFromJson('auth.register'); ?> <?php $__env->stopSection(); ?> <?php $__env->startSection('description', 'Register to the
admin area'); ?> <?php $__env->startSection('content'); ?>
<br>
<div class="container">
	<div class="card-container text-center">
		<div class="title"><?php echo app('translator')->getFromJson('auth.register'); ?></div>
		<div class="subtitle"><?php echo app('translator')->getFromJson('auth.register_label'); ?></div>
		<?php echo $__env->make('notifications.status_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php echo $__env->make('notifications.errors_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>

	<div class="card card-container">
		<div class="client-feedback client-feedback-warning hidden">
			<h4>Xin lỗi, có một vài vấn đề!</h4>
			<p>Bạn cần hoàn thành các yêu cầu dưới đây</p>
		</div>

		<div class="client-feedback client-feedback-success hidden">
			<!-- <h4>Your A Champ!</h4>  -->
			<p>Tất cả thông tin của bạn phù hợp!</p>
		</div>
		<form class="form-signin" method="POST" action="<?php echo e(url('/register')); ?>" id="form-register" data-parsley-validate="">
			<?php echo e(csrf_field()); ?>

			<input type="text" id="username" name="username" class="form-control" placeholder="<?php echo app('translator')->getFromJson('auth.placeholder_username'); ?>" value="<?php echo e(old('username')); ?>"
			  required autofocus data-parsley-required-message="Yêu cầu nhập tên tài khoản" data-parsley-trigger="change focusout" data-parsley-minlength="5"
			  data-parsley-maxlength="20"> <?php if($errors->has('username')): ?>
			<span class="help-block">
							<strong><?php echo e($errors->first('name')); ?></strong>
						</span> <?php endif; ?>
			<input type="text" id="first_name" name="first_name" class="form-control" placeholder="<?php echo app('translator')->getFromJson('auth.placeholder_firstname'); ?>"
			  value="<?php echo e(old('first_name')); ?>" required autofocus data-parsley-required-message="Yêu cầu nhập tên" data-parsley-trigger="change focusout"
			  data-parsley-minlength="2" data-parsley-maxlength="32"> <?php if($errors->has('first_name')): ?>
			<span class="help-block">
							<strong><?php echo e($errors->first('name')); ?></strong>
						</span> <?php endif; ?>
			<input type="text" id="last_name" name="last_name" class="form-control" placeholder="<?php echo app('translator')->getFromJson('auth.placeholder_lastname'); ?>"
			  value="<?php echo e(old('last_name')); ?>" required autofocus data-parsley-required-message="Yêu cầu nhập họ" data-parsley-trigger="change focusout"
			  data-parsley-minlength="2" data-parsley-maxlength="32"> <?php if($errors->has('last_name')): ?>
			<span class="help-block">
							<strong><?php echo e($errors->first('name')); ?></strong>
						</span> <?php endif; ?>
			<input type="phone" id="phone" name="phone" class="form-control" placeholder="<?php echo app('translator')->getFromJson('auth.placeholder_phone'); ?>" value="<?php echo e(old('phone')); ?>"
			  required autofocus data-parsley-required-message="Yêu cầu nhập số điện thoại" data-parsley-trigger="change focusout">			<?php if($errors->has('phone')): ?>
			<span class="help-block">
							<strong><?php echo e($errors->first('phone')); ?></strong>
						</span> <?php endif; ?>
			<input type="email" id="email" name="email" class="form-control" placeholder="<?php echo app('translator')->getFromJson('auth.placeholder_emailaddress'); ?>" value="<?php echo e(old('email')); ?>"
			  required autofocus data-parsley-required-message="Yêu cầu nhập địa chỉ Email" data-parsley-trigger="change focusout" data-parsley-type="email">			<?php if($errors->has('email')): ?>
			<span class="help-block">
							<strong><?php echo e($errors->first('email')); ?></strong>
						</span> <?php endif; ?>

			<input type="password" id="password" name="password" class="form-control" placeholder="<?php echo app('translator')->getFromJson('auth.placeholder_password'); ?>"
			  required data-parsley-required-message="Yêu cầu nhập mật khẩu" data-parsley-trigger="change focusout" data-parsley-minlength="5"
			  data-parsley-maxlength="32"> <?php if($errors->has('password')): ?>
			<span class="help-block">
							<strong><?php echo e($errors->first('password')); ?></strong>
						</span> <?php endif; ?>
			<input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="<?php echo app('translator')->getFromJson('auth.placeholder_confirmpassword'); ?>"
			  required data-parsley-required-message="Bạn cần xác nhận mật khẩu" data-parsley-trigger="change focusout" data-parsley-minlength="5"
			  data-parsley-maxlength="32" data-parsley-equalto="#password" data-parsley-equalto-message="Mật khẩu xác nhận không khớp">
			<div class="g-recaptcha" data-sitekey="<?php echo e(env('SETTINGS_GOOGLE_RECAPTCHA_SITE_KEY')); ?>"></div>

			<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit"><?php echo app('translator')->getFromJson('auth.signup'); ?></button>
		</form>
		<!-- /form -->
		<a href="<?php echo e(url('/password/reset')); ?>" class="forgot-password"><?php echo app('translator')->getFromJson('auth.forgotpassword'); ?></a> hoặc <a href="<?php echo e(url('/username/reminder')); ?>"
		  class="forgot-password"><?php echo app('translator')->getFromJson('auth.forgotusername'); ?></a>
	</div>
	<!-- /card-container -->
	<div class="card-container text-center">
		<a href="<?php echo e(url('/')); ?>" class="new-account"><?php echo app('translator')->getFromJson('auth.backhome'); ?></a> hoặc <a href="<?php echo e(url('/login')); ?>" class="new-account"><?php echo app('translator')->getFromJson('auth.login'); ?></a>
	</div>
</div>
<!-- /container -->
<br> <?php $__env->stopSection(); ?> <?php $__env->startSection('scripts'); ?>
<script src='https://www.google.com/recaptcha/api.js<?php echo e(__('auth.recaptcha')); ?>'></script>
<script src="<?php echo e(url('/')); ?>/public/assets/js/plugins/parsley/parsley.js"></script>
<script>
	$(function () {
		$('#form-register').parsley().on('field:validated', function () {
			var ok = $('.parsley-error').length === 0;
			$('.client-feedback-success').toggleClass('hidden', !ok);
			$('.client-feedback-warning').toggleClass('hidden', ok);
		});
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>