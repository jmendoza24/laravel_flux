<ul class="nav nav-tabs nav-underline no-hover-bg">
  <li class="nav-item">
    <a class="nav-link active" id="base-tab31" data-toggle="tab" aria-controls="tab31"
    href="#tab31" aria-expanded="true">Producción</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="base-tab32" data-toggle="tab" aria-controls="tab32" href="#tab32"
    aria-expanded="false">Calidad</a>
  </li>
</ul>
<div class="tab-content px-1 pt-1">
  <div role="tabpanel" class="tab-pane active" id="tab31" aria-expanded="true" aria-labelledby="base-tab31">
  	<div id="seg_produccion">
    <?php echo $__env->make('ordenes_compras.seguimiento_produccion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
  <div class="tab-pane" id="tab32" aria-labelledby="base-tab32">
    <div class="row" style="overflow-y: scroll; max-height: 400px;" id="seguimiento_calidad">
    <?php echo $__env->make('ordenes_compras.informe_seguimiento', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
</div>
<?php /**PATH /var/www/html/flux/laravel/resources/views/ordenes_compras/info_subprocesos.blade.php ENDPATH**/ ?>