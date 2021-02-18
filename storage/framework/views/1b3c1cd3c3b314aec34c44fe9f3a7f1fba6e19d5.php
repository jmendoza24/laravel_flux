<?php $__env->startSection('titulo'); ?>Nuevo Empleado <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php ($editar=0); ?>

    <?php echo $__env->make('adminlte-templates::common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo Form::open(['route' => 'tblRhs.store','enctype'=>'multipart/form-data']); ?>

            <?php echo $__env->make('tbl_rhs.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/tbl_rhs/create.blade.php ENDPATH**/ ?>