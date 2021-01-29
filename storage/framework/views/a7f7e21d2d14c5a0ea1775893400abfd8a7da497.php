<div class="row" style="background: #F5F7FA; padding: 10px;">
  <?php $__currentLoopData = $plantas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="col-xl-3 col-lg-6 col-12">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="align-self-center">
              <i class="icon-pointer danger font-large-2 float-left" style="cursor: pointer;" onclick="obtiene_info_plantas(<?php echo e($planta->planta); ?>)"></i>
            </div>
            <div class="media-body text-right">
              <h3><?php echo e($planta->conteo); ?></h3>
              <span><?php echo e($planta->nombre); ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="row">
  <div class="col-md-12" id="tabla_plantas" style="overflow-x: scroll;">
    <?php echo $__env->make('ordenes_compras.tabla_plantas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
</div><?php /**PATH /var/www/html/flux/laravel/resources/views/ordenes_compras/ordnesporenviar.blade.php ENDPATH**/ ?>