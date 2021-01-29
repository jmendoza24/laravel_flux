

<?php $__env->startSection('titulo'); ?>
    Validación OT-000<?php echo e($ordenesCompra->id); ?> | <b>Fecha :</b> <?php echo e(date("m-d-Y", strtotime($ordenesCompra->fecha))); ?>

<?php $__env->stopSection(); ?>  

<?php $__env->startSection('content'); ?>
<?php ($editar = 0); ?>
<?php ($nuevo = 1); ?>

<div class="col-md-12">
  <div id="detalle_cotiza">
    <?php echo $__env->make('ordenes_compras.detalle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
  <hr>
  <div class="form-group col-sm-12" style="text-align: right;">
    <a href="<?php echo e(route('ordenesCompras.index')); ?>" class="btn btn-warning mr-1">Regresar</a>
    <?php if($ordenesCompra->tipo==1): ?>
    <a style="color: white;" onclick="validar_orden(<?php echo e($ordenesCompra->id); ?>)" class="btn btn-primary">Validar</a>
    <?php endif; ?>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/flux/laravel/resources/views/ordenes_compras/show.blade.php ENDPATH**/ ?>