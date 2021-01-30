<?php $__env->startSection('titulo'); ?>Editar Empleado <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php ($editar=1); ?>
  <?php echo $__env->make('adminlte-templates::common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo Form::model($tblRh, ['route' => ['tblRhs.update', $tblRh->id], 'method' => 'patch']); ?>

    <?php echo $__env->make('tbl_rhs.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/tbl_rhs/edit.blade.php ENDPATH**/ ?>