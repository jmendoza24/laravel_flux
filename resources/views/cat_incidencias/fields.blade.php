<!-- Incidencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('incidencia', 'Incidencia:') !!}
    {!! Form::text('incidencia', null, ['class' => 'form-control']) !!}
</div>

<!-- Documento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('documento', 'Documento:') !!}
    {!! Form::text('documento', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('catIncidencias.index') !!}" class="btn btn-default">Cancel</a>
</div>
