
<?php $__env->startSection('titulo'); ?>Editar cliente <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php ($editar = 1); ?>
 <?php echo Form::model($clientes, ['route' => ['clientes.update', $clientes->id], 'method' => 'patch']); ?>

      <?php echo $__env->make('clientes.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/flux/laravel/resources/views/clientes/edit.blade.php ENDPATH**/ ?>