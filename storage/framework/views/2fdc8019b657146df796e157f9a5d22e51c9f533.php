<h3 id="titulo_tabla"><?php echo e($data['nom_col']); ?></h3> <br>
<div class="col-md-12">
	<label>Comentarios:</label>
	<textarea class="form-control" id="comentario_seg" style="height: 250px;"><?php echo e($data['valor']); ?></textarea>
</div>
<hr>
<div class="col-md-12" style="text-align: right;">
	<button class="btn btn-success" onclick="guarda_planeacion(<?php echo e($data['columna']); ?>,<?php echo e($data['id_detalle']); ?>,<?php echo e($data['id_orden']); ?>);">
		Guardar
	</button>
</div>
<?php /**PATH /var/www/html/flux/laravel/resources/views/ordenes_compras/seguimiento_comentarios.blade.php ENDPATH**/ ?>