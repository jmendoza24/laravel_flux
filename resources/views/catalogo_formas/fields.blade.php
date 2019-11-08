<!-- Id Forma Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_forma', 'Id Forma:') !!}
    {!! Form::number('id_forma', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor', 'Valor:') !!}
    {!! Form::text('valor', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('catalogoFormas.index') !!}" class="btn btn-default">Cancel</a>
</div>
