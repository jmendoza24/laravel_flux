
<?php $__env->startSection('titulo'); ?>Inventario de materiales <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-12">
    <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="<?php echo route('materiales.create'); ?>">+ Material</a>
   </h1>
</div>
<br><br><br/>
<div class="col-md-12" style="overflow-x: scroll;">
    <?php echo $__env->make('materiales.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
	$( document ).ready(function() {
    	$("#materiales-table").DataTable({"paging": false, "lengthChange": false, "sSearch":"Buscar:","bInfo": false});
	});
	
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/flux/laravel/resources/views/materiales/index.blade.php ENDPATH**/ ?>