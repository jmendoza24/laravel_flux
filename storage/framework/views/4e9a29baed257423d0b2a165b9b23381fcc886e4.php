<div class="row">
	<!-- Puesto Field -->
	<div class="form-group col-sm-6">
	    <?php echo Form::label('puesto', 'Puesto:'); ?>

	    <?php echo Form::text('puesto', null, ['class' => 'form-control']); ?>

	</div>

	<!-- Submit Field -->
	<div class="form-group col-sm-12">
	    <a href="<?php echo route('puestos.index'); ?>" class="btn btn-warning mr-1">Cancelar</a>
	    <?php echo Form::submit('Guardar', ['class' => 'btn btn-primary']); ?>

	</div>
</div>
<?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/puestos/fields.blade.php ENDPATH**/ ?>