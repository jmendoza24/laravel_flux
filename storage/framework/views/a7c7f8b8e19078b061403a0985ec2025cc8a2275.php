
<?php $__env->startSection('titulo'); ?>
    Asignación OT-000<?php echo e($ordenesCompra->id); ?> | <b>Fecha :</b> <?php echo e(date("m-d-Y", strtotime($ordenesCompra->fecha))); ?>

  
<?php $__env->stopSection(); ?>  
<?php $__env->startSection('content'); ?>
<?php ($editar = 1); ?>
<?php ($nuevo = 0); ?>
<?php echo Form::model($ordenesCompra, ['route' => ['ordenesCompras.update', $ordenesCompra->id], 'method' => 'patch','class'=>'needs-validation','novalidate']); ?>

    <div class="col-md-12">
   <?php echo $__env->make('ordenes_compras.detalle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php echo Form::close(); ?>

  <?php if($ordenesCompra->tipo !=3): ?>
    <br>
    <button class="btn btn-primary pull-right" onclick="finalizar_asignacion(<?php echo e($ordenesCompra->id); ?>)">Asignar</button><br><br>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/flux/laravel/resources/views/ordenes_compras/edit.blade.php ENDPATH**/ ?>