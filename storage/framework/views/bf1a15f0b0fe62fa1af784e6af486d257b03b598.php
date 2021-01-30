<?php $__env->startSection('titulo'); ?>Editar equipo <?php $__env->stopSection(); ?>
<?php ($editar = 1); ?>
<?php $__env->startSection('content'); ?>
 <?php echo Form::model($equipos, ['route' => ['equipos.update', $equipos->id], 'method' => 'patch']); ?>

      <?php echo $__env->make('equipos.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo Form::close(); ?>              
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/equipos/edit.blade.php ENDPATH**/ ?>