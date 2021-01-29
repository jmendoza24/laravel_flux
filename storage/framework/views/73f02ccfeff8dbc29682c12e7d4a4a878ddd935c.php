
<?php $__env->startSection('titulo'); ?>Ordenes de trabajo <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-12">
    <h1 class="pull-right">
       <!--<a class="btn btn-success" style="margin-top: -10px;margin-bottom: 5px" href="<?php echo e(route('enviados.index')); ?>" title="Envios a plantas"><i  class="fa fa-map-marker" aria-hidden="true" ></i></a>--->
       <a class="btn btn-primary" style="margin-top: -10px;margin-bottom: 5px" href="<?php echo route('ordenesCompras.create'); ?>" title="Nueva OT"><i  class="fa fa-plus-circle" aria-hidden="true" ></i></a>
       <a class="btn btn-primary" style="margin-top: -10px;margin-bottom: 5px" href="<?php echo route('ordenesCompras.seguimiento'); ?>" class='btn  btn-float btn-outline-info btn-round' title="Seguimiento"><i  class="fa fa-list-ul" aria-hidden="true"></i></a>                    

    </h1>
</div>
<br><br><br>
<ul class="nav nav-tabs nav-underline no-hover-bg">
  <li class="nav-item">
    <a class="nav-link active" id="base-tab31" data-toggle="tab" aria-controls="tab31"
    href="#tab31" aria-expanded="true">OT</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="base-tab32" data-toggle="tab" aria-controls="tab32" href="#tab32"
    aria-expanded="false">Ordenes por enviar</a>
  </li>
</ul>
<div class="tab-content px-1 pt-1">
  <div role="tabpanel" class="tab-pane active" id="tab31" aria-expanded="true" aria-labelledby="base-tab31">
    <div class="col-md-12" style="overflow-x: scroll;">
      <?php echo $__env->make('ordenes_compras.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
  <div class="tab-pane" id="tab32" aria-labelledby="base-tab32">
    <div class="col-md-12" style="overflow-x: scroll;" id="ordnesporenviar">
      <?php echo $__env->make('ordenes_compras.ordnesporenviar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $(document).ready(function() {
    $('#ordenesCompras-table').DataTable( {
        "paging":   false,
        "ordering": true,
        "info":     true,
        "order": [[ 0, "desc" ]]
    } );
} );

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/flux/laravel/resources/views/ordenes_compras/index.blade.php ENDPATH**/ ?>