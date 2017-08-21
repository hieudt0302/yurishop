<?php $__env->startSection('content'); ?>
   <div class="row">
	   <div class="col-lg-12 margin-tb">
		   <div class="pull-left">
			   <h2>Role Management</h2>
		   </div>
		   <div class="pull-right">
			   <?php if (\Entrust::can('role-create')) : ?>
			   <a class="btn btn-success" href="<?php echo e(route('admin.roles.create')); ?>"> Create New Role</a>
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
		   <th>No</th>
		   <th>Name</th>
		   <th>Description</th>
		   <th width="280px">Action</th>
	   </tr>
   <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <tr>
	   <?php if($role->name==='admin'): ?>
		   <?php if (\Entrust::hasRole('admin')) : ?>
		   <td><?php echo e(++$i); ?></td>
		   <td><?php echo e($role->display_name); ?></td>
		   <td><?php echo e($role->description); ?></td>
		   <td>
			   <a class="btn btn-info" href="<?php echo e(route('admin.roles.show',$role->id)); ?>">Show</a>
		   </td>
		   <?php endif; // Entrust::hasRole ?>
	   <?php else: ?> 
		   <td><?php echo e(++$i); ?></td>
		   <td><?php echo e($role->display_name); ?></td>
		   <td><?php echo e($role->description); ?></td>
		   <td>
			   <?php if (\Entrust::can('role-show')) : ?>
			   <a class="btn btn-info" href="<?php echo e(route('admin.roles.show',$role->id)); ?>">Show</a>
			   <?php endif; // Entrust::can ?>
			   <?php if (\Entrust::hasRole('admin')) : ?>
			   <a class="btn btn-primary" href="<?php echo e(route('admin.roles.edit',$role->id)); ?>">Edit</a>
			   <?php echo Form::open(['method' => 'DELETE','route' => ['admin.roles.destroy', $role->id],'style'=>'display:inline']); ?>

			   <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

			   <?php echo Form::close(); ?>

			   <?php endif; // Entrust::hasRole ?>
		   </td>
	   <?php endif; ?>
   </tr>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </table>
   <?php echo $roles->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>