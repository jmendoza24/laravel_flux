<?php if(count($subprocesos)>0): ?>
<?php ($sub_total = 0); ?>
<?php ($total = 0); ?>
<?php $__currentLoopData = $subprocesos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subproceso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php ($sub_total = $subproceso->hora1 + $subproceso->hora2 + $subproceso->hora3 + $subproceso->hora4 + $subproceso->hora5+ $subproceso->hora6 + $subproceso->hora7 + $subproceso->hora8 + $subproceso->hora9 + $subproceso->hora10); ?>
		<?php ($total += $sub_total); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<input type="text" name="" id="producto" class="form-control" disabled="disabled">
<table class="table table-bordered">
		<tr>
			<td>Proceso</td>
			<td><?php echo e($subprocesos[0]->procesos); ?></td>
			<td>Horas prog:</td>
			<td><?php echo e($subprocesos[0]->horas); ?></td>
			<td>Horas laboradas:</td>
			<td><?php echo e($total); ?></td>
			<td>Avance</td>
			<td><?php echo e(number_format(($total * 100)/ $subprocesos[0]->horas,0)); ?> %</td>
		</tr>
</table>
<div class="col-md-12">
<table class="table table-bordered table-striped small" id="tabla_procesos_seg">
	<thead>
		<tr style="text-align: center;">
			<th>Subproceso</th>
			<th>Total horas</th>
			<th>Fecha inicio</th>
			<th>T1</th>
			<th>T2</th>
			<th>T3</th>
			<th>T4</th>
			<th>T5</th>
			<th>T6</th>
			<th>T7</th>
			<th>T8</th>
			<th>T9</th>
			<th>T10</th>
			<th>Fecha término</th>
		</tr>
	</thead>
	<tbody>
		
		<?php $__currentLoopData = $subprocesos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subproceso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php ($sub_total = $subproceso->hora1 + $subproceso->hora2 + $subproceso->hora3 + $subproceso->hora4 + $subproceso->hora5+ $subproceso->hora6 + $subproceso->hora7 + $subproceso->hora8 + $subproceso->hora9 + $subproceso->hora10); ?>
		<tr>
			<td><?php echo e($subproceso->subproceso); ?></td>
			<td style="text-align: right;" ><?php echo e($sub_total); ?></td>
			<td>
				<input type="date" id="fecha_inicio_<?php echo e($id_detalle); ?>_<?php echo e($subproceso->idsub); ?>" class="form-control"  onchange="guarda_seg_produccion('fecha_inicio',<?php echo e($id_detalle); ?>,<?php echo e($subproceso->idsub); ?>)" value="<?php echo e($subproceso->fecha_inicio); ?>">
			</td>
			<td><input type="text" style="width: 80px;"   id="hora1_<?php echo e($id_detalle); ?>_<?php echo e($subproceso->idsub); ?>" class="mask form-control" value="<?php echo e($subproceso->hora1); ?>" onchange="guarda_seg_produccion('hora1',<?php echo e($id_detalle); ?>,<?php echo e($subproceso->idsub); ?>)"></td>
			<td><input type="text" style="width: 80px;"   id="hora2_<?php echo e($id_detalle); ?>_<?php echo e($subproceso->idsub); ?>" class="mask form-control" value="<?php echo e($subproceso->hora2); ?>" onchange="guarda_seg_produccion('hora2',<?php echo e($id_detalle); ?>,<?php echo e($subproceso->idsub); ?>)"></td>
			<td><input type="text" style="width: 80px;"   id="hora3_<?php echo e($id_detalle); ?>_<?php echo e($subproceso->idsub); ?>" class="mask form-control" value="<?php echo e($subproceso->hora3); ?>" onchange="guarda_seg_produccion('hora3',<?php echo e($id_detalle); ?>,<?php echo e($subproceso->idsub); ?>)"></td>
			<td><input type="text" style="width: 80px;"   id="hora4_<?php echo e($id_detalle); ?>_<?php echo e($subproceso->idsub); ?>" class="mask form-control" value="<?php echo e($subproceso->hora4); ?>" onchange="guarda_seg_produccion('hora4',<?php echo e($id_detalle); ?>,<?php echo e($subproceso->idsub); ?>)"></td>
			<td><input type="text" style="width: 80px;"   id="hora5_<?php echo e($id_detalle); ?>_<?php echo e($subproceso->idsub); ?>" class="mask form-control" value="<?php echo e($subproceso->hora5); ?>" onchange="guarda_seg_produccion('hora5',<?php echo e($id_detalle); ?>,<?php echo e($subproceso->idsub); ?>)"></td>
			<td><input type="text" style="width: 80px;"   id="hora6_<?php echo e($id_detalle); ?>_<?php echo e($subproceso->idsub); ?>" class="mask form-control" value="<?php echo e($subproceso->hora6); ?>" onchange="guarda_seg_produccion('hora6',<?php echo e($id_detalle); ?>,<?php echo e($subproceso->idsub); ?>)"></td>
			<td><input type="text" style="width: 80px;"   id="hora7_<?php echo e($id_detalle); ?>_<?php echo e($subproceso->idsub); ?>" class="mask form-control" value="<?php echo e($subproceso->hora7); ?>" onchange="guarda_seg_produccion('hora7',<?php echo e($id_detalle); ?>,<?php echo e($subproceso->idsub); ?>)"></td>
			<td><input type="text" style="width: 80px;"   id="hora8_<?php echo e($id_detalle); ?>_<?php echo e($subproceso->idsub); ?>" class="mask form-control" value="<?php echo e($subproceso->hora8); ?>" onchange="guarda_seg_produccion('hora8',<?php echo e($id_detalle); ?>,<?php echo e($subproceso->idsub); ?>)"></td>
			<td><input type="text" style="width: 80px;"   id="hora9_<?php echo e($id_detalle); ?>_<?php echo e($subproceso->idsub); ?>" class=" mask form-control" value="<?php echo e($subproceso->hora9); ?>" onchange="guarda_seg_produccion('hora9',<?php echo e($id_detalle); ?>,<?php echo e($subproceso->idsub); ?>)"></td>
			<td><input type="text" style="width: 80px;"   id="hora10_<?php echo e($id_detalle); ?>_<?php echo e($subproceso->idsub); ?>" class="mask form-control" value="<?php echo e($subproceso->hora10); ?>" onchange="guarda_seg_produccion('hora10',<?php echo e($id_detalle); ?>,<?php echo e($subproceso->idsub); ?>)"></td>
			<td><input type="date" id="fecha_fin_<?php echo e($id_detalle); ?>_<?php echo e($subproceso->idsub); ?>" class="form-control" value="<?php echo e($subproceso->fecha_fin); ?>" onchange="guarda_seg_produccion('fecha_fin',<?php echo e($id_detalle); ?>,<?php echo e($subproceso->idsub); ?>)"></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>
</div>
<?php else: ?>
<h5>Agregue al menos un subproceso para la captura de horas</h5>
<?php endif; ?><?php /**PATH /var/www/html/flux/laravel/resources/views/ordenes_compras/seguimiento_produccion.blade.php ENDPATH**/ ?>