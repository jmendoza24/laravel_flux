<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Rfc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rfc', 'Rfc:') !!}
    {!! Form::text('rfc', null, ['class' => 'form-control']) !!}
</div>

<!-- Domicilio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('domicilio', 'Domicilio:') !!}
    {!! Form::text('domicilio', null, ['class' => 'form-control']) !!}
</div>

<!-- Lugar Nac Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lugar_nac', 'Lugar Nac:') !!}
    {!! Form::text('lugar_nac', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Nacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
    {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control','id'=>'fecha_nacimiento']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#fecha_nacimiento').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Parentesco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parentesco', 'Parentesco:') !!}
    {!! Form::number('parentesco', null, ['class' => 'form-control']) !!}
</div>

<!-- Porcentage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('porcentage', 'Porcentage:') !!}
    {!! Form::text('porcentage', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('catBeneficiarios.index') !!}" class="btn btn-default">Cancel</a>
</div>
