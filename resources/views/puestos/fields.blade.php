<div class="row">
	<!-- Puesto Field -->
	<div class="form-group col-sm-6">
	    {!! Form::label('puesto', 'Puesto:') !!}
	    {!! Form::text('puesto', null, ['class' => 'form-control']) !!}
	</div>

	<!-- Submit Field -->
	<div class="form-group col-sm-12">
	    <a href="{!! route('puestos.index') !!}" class="btn btn-warning mr-1">Cancelar</a>
	    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
	</div>
</div>
