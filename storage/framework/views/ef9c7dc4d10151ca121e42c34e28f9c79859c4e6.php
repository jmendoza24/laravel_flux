<?php $__env->startSection('titulo'); ?>Nuevo departamento <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo Form::open(['route' => 'departamento.store','class'=>'needs-validation','novalidate']); ?>

    <?php echo $__env->make('departamento.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo Form::close(); ?>            
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/departamento/create.blade.php ENDPATH**/ ?>