<?php if(sizeof($detalle)>0): ?>
<button onclick="envia_plantas(<?php echo e($detalle[0]->planta); ?>)" class="btn btn-primary pull-right">Enviar</button>
<br><br>
<?php endif; ?>
<table class="table display nowrap table-striped table-bordered" id="tabla_plantas_n">
	<thead>
		<tr style="background: #518a87; color: white;">
			<td>IDN</td>
			<td>Planta</td>
			<td>Pieza</td>
			<td>Descripción</td>
			<td>Precio unidad</td>
		</tr>
	</thead>
	<?php $__currentLoopData = $detalle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td>FM<?php echo e(str_pad($det->id,6,'0',STR_PAD_LEFT)); ?></td>
		<td><?php echo e($det->nombre); ?></td>
		<td>1</td>
		<td><?php echo e($det->descripcion); ?></td>
		<td style="text-align: right;">$<?php echo e(number_format($det->costo_produccion,2)); ?></td>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table><?php /**PATH /var/www/html/flux/laravel/resources/views/ordenes_compras/tabla_plantas.blade.php ENDPATH**/ ?>