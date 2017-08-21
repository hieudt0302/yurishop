 
<?php $__env->startSection('content'); ?>
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Quản Lý Người Dùng</h2>
	        </div>
	        <div class="pull-right">
				<?php if (\Entrust::can('user-create')) : ?>
	            <a class="btn btn-success" href="<?php echo e(route('admin.users.create')); ?>"> Tạo Mới</a>
				<?php endif; // Entrust::can ?>
	        </div>
	    </div>
	</div>
	<?php if($message = Session::get('success')): ?>
		<div class="alert alert-success">
			<p><?php echo e($message); ?></p>
		</div>
	<?php endif; ?>
	<table class="table table-bordered">
		<tr>
			<th>#</th>
			<th>Tài Khoản</th>
			<th>Email</th>
			<th>Quyền</th>
			<th width="280px">Thao Tác</th>
		</tr>
	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<?php if(Auth::user()->id===$user->id): ?>
			<td><?php echo e(++$i); ?></td>
			<td><?php echo e($user->username); ?></td>
			<td><?php echo e($user->email); ?></td>
			<td>
				<?php if(!empty($user->roles)): ?>
					<?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<label class="label label-success"><?php echo e($v->display_name); ?></label>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
			</td>
			<td>
		 		<?php if (\Entrust::can('user-show')) : ?>
				<a class="btn btn-info" href="<?php echo e(route('admin.users.show',$user->id)); ?>">Xem</a>
				<?php endif; // Entrust::can ?>
			
				<?php if (\Entrust::can('user-edit')) : ?>
				<a class="btn btn-primary" href="<?php echo e(route('admin.users.edit',$user->id)); ?>">Sửa</a>
				<?php endif; // Entrust::can ?>
			</td>
		<?php else: ?>
			<td><?php echo e(++$i); ?></td>
			<td><?php echo e($user->username); ?></td>
			<td><?php echo e($user->email); ?></td>
			<td>
				<?php if(!empty($user->roles)): ?>
					<?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<label class="label label-success"><?php echo e($v->display_name); ?></label>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
			</td>
			<td>
		 		<?php if (\Entrust::can('user-show')) : ?>
				<a class="btn btn-info" href="<?php echo e(route('admin.users.show',$user->id)); ?>">Xem</a>
				<?php endif; // Entrust::can ?>
			
				<?php if (\Entrust::can('user-edit')) : ?>
				<a class="btn btn-primary" href="<?php echo e(route('admin.users.edit',$user->id)); ?>">Sửa</a>
				<?php endif; // Entrust::can ?>

            	<?php if (\Entrust::can('user-delete')) : ?>
				<?php echo Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id],'style'=>'display:inline']); ?>

				<?php echo Form::submit('Xóa', ['class' => 'btn btn-danger']); ?>

        		<?php echo Form::close(); ?>

				<?php endif; // Entrust::can ?> 
			</td>
		<?php endif; ?>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
	<?php echo $data->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>