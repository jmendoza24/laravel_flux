<?php $__env->startSection('titulo'); ?>Editar departamento <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?> 
 <?php echo Form::model($departamentos, ['route' => ['departamento.update', $departamentos->id], 'method' => 'patch','class'=>'needs-validation','novalidate']); ?>

      <?php echo $__env->make('departamento.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/departamento/edit.blade.php ENDPATH**/ ?>