
<?php $__env->startSection('titulo'); ?>Nuevo cliente <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php ($editar = 0); ?>      
<?php echo Form::open(['route' => 'clientes.store','class'=>'needs-validation','novalidate']); ?>

    <?php echo $__env->make('clientes.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/flux/laravel/resources/views/clientes/create.blade.php ENDPATH**/ ?>