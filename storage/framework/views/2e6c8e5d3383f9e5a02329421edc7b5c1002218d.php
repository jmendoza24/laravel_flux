<div class="col-md-12">
	 <h5>Expediente</h5>
	 <hr>
	 <table class="table table-striped table-bordered">
	   <tr class="btn-primary text-center">
	     <td><b>Documentos</b></td>
	     <td><b>SI</b></td>
	     <td><b>NO</b></td>
	     <td><b>NA</b></td>
	   </tr>
	   <?php $__currentLoopData = $docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	   <tr class="text-center">
	     <td class="text-left"><?php echo e($doc->documento); ?></td>
	     <td><input type="radio" name="dc_<?php echo e($doc->id); ?>" value="1" <?php echo e($doc->existe ==1 ? 'checked' : ''); ?> onchange="guarda_check(<?php echo e($id); ?>,1,<?php echo e($doc->id); ?>)"></td>
	     <td><input type="radio" name="dc_<?php echo e($doc->id); ?>" value="2" <?php echo e($doc->existe ==2 ? 'checked' : ''); ?> onchange="guarda_check(<?php echo e($id); ?>,2,<?php echo e($doc->id); ?>)"></td>
	     <td><input type="radio" name="dc_<?php echo e($doc->id); ?>" value="3" <?php echo e($doc->existe ==3 ? 'checked' : ''); ?> onchange="guarda_check(<?php echo e($id); ?>,3,<?php echo e($doc->id); ?>)"></td>
	   </tr>
	   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	   <tr>
	     <td colspan="4" style="border: 2px solid #518a87;"><?php if($expediente->archivo != ''): ?> <a id="doc2" href="<?php echo e($expediente->archivo); ?>" target="_blank" > <span><i class="fa fa-file-pdf-o"></i> <b >Expediente</b></span></a> <?php endif; ?></td>
	   </tr>
	 </table>
</div>
<?php $__currentLoopData = $conteos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if($c->id_documento == 2 and $c->conteo > 0): ?>
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
								<td style="width: 50px;"><span onclick="elimina_catalogo(3,<?php echo e($d->id); ?>,'',<?php echo e($d->id_empleado); ?>,1)"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span></td>
							</tr>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
		<br>
	<?php endif; ?>
	<?php if($c->id_documento == 3 and $c->conteo > 0): ?>
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
								<td style="width: 50px;"><span onclick="elimina_catalogo(3,<?php echo e($d->id); ?>,'',<?php echo e($d->id_empleado); ?>,1)"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span></td>
							</tr>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
		<br>
	<?php endif; ?>
	<?php if($c->id_documento == 4 and $c->conteo > 0): ?>
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
								<td style="width: 50px;"><span onclick="elimina_catalogo(3,<?php echo e($d->id); ?>,'',<?php echo e($d->id_empleado); ?>,1)"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span></td>
							</tr>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
		<br>	
	<?php endif; ?>
	<?php if($c->id_documento == 5 and $c->conteo > 0): ?>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/tbl_rhs/lista_docs.blade.php ENDPATH**/ ?>