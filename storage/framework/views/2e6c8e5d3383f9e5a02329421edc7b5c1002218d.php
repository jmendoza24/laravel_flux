<div class="row">
<?php if($conteos->doc2 > 0): ?>
<div class="col-md-6">
	<table class="table table-striped table-bordered">
		<thead class="bg-success">
			<tr>
				<th>Accidente o Incidente</th>
				<td>Fecha</td>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($d->id_documento ==2): ?>
					<tr>
						<td><?php if($d->archivo != ''): ?> <a id="doc2" href="<?php echo e($d->archivo); ?>" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a> <?php endif; ?>
						 <?php echo e($d->descripcion); ?></td>
						<td><?php echo e($d->fecha); ?></td>
						<td style="width: 50px;"><span onclick="elimina_catalogo(3,<?php echo e($d->id); ?>,'',<?php echo e($d->id_empleado); ?>)"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span></td>
					</tr>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</div>
<br>
<?php endif; ?>
<?php if($conteos->doc3 > 0): ?>
<div class="col-md-6">
	<table class="table table-striped table-bordered" >
		<thead class="bg-success">
			<tr>
				<th>Reporte de Conducta</th>
				<td>Fecha</td>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($d->id_documento ==3): ?>
					<tr>
						<td><?php if($d->archivo != ''): ?> <a id="doc2" href="<?php echo e($d->archivo); ?>" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a> <?php endif; ?>
						 <?php echo e($d->descripcion); ?></td>
						<td><?php echo e($d->fecha); ?></td>
						<td style="width: 50px;"><span onclick="elimina_catalogo(3,<?php echo e($d->id); ?>,'',<?php echo e($d->id_empleado); ?>)"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span></td>
					</tr>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</div>
<br>
<?php endif; ?>
<?php if($conteos->doc4 > 0): ?>
<div class="col-md-6">
	<table class="table table-striped table-bordered">
		<thead class="bg-success">
			<tr>
				<th>Reporte Médico</th>
				<td>Fecha</td>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($d->id_documento ==4): ?>
					<tr>
						<td><?php if($d->archivo != ''): ?> <a id="doc2" href="<?php echo e($d->archivo); ?>" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a> <?php endif; ?>
						 <?php echo e($d->descripcion); ?></td>
						<td><?php echo e($d->fecha); ?></td>
						<td style="width: 50px;"><span onclick="elimina_catalogo(3,<?php echo e($d->id); ?>,'',<?php echo e($d->id_empleado); ?>)"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span></td>
					</tr>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</div>
<br>
<?php endif; ?>
<?php if($conteos->doc5 > 0): ?>
<div class="col-md-6">
	<table class="table table-striped table-bordered">
		<thead class="bg-success">
			<tr>
				<th>Entrenamiento y Certificación</th>
				<td>Fecha</td>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($d->id_documento ==5): ?>
					<tr>
						<td><?php if($d->archivo != ''): ?> <a id="doc2" href="<?php echo e($d->archivo); ?>" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a> <?php endif; ?>
						 <?php echo e($d->descripcion); ?></td>
						<td><?php echo e($d->fecha); ?></td>
						<td style="width: 50px;"><span onclick="elimina_catalogo(3,<?php echo e($d->id); ?>,'',<?php echo e($d->id_empleado); ?>)"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span></td>
					</tr>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</div>
<?php endif; ?>
</div><?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/tbl_rhs/lista_docs.blade.php ENDPATH**/ ?>