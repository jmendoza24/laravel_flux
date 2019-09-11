<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::number('tipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Condicion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('condicion', 'Condicion:') !!}
    {!! Form::textarea('condicion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('condiciones.index') !!}" class="btn btn-default">Cancel</a>
</div>
