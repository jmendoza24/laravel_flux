

<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control','id'=>'fecha']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#fecha').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente', 'Cliente:') !!}
    {!! Form::number('cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Parte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_parte', 'Numero Parte:') !!}
    {!! Form::text('numero_parte', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Dibujo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dibujo', 'Dibujo:') !!}
    {!! Form::number('dibujo', null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Costo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('costo', 'Costo:') !!}
    {!! Form::number('costo', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Usd Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio_usd', 'Precio Usd:') !!}
    {!! Form::number('precio_usd', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Notas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_notas', 'Id Notas:') !!}
    {!! Form::number('id_notas', null, ['class' => 'form-control']) !!}
</div>

<!-- Tiempo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tiempo', 'Tiempo:') !!}
    {!! Form::number('tiempo', null, ['class' => 'form-control']) !!}
</div>

<!-- Income Field -->
<div class="form-group col-sm-6">
    {!! Form::label('income', 'Income:') !!}
    {!! Form::number('income', null, ['class' => 'form-control']) !!}
</div>

<!-- Termino Pago Field -->
<div class="form-group col-sm-6">
    {!! Form::label('termino_pago', 'Termino Pago:') !!}
    {!! Form::text('termino_pago', null, ['class' => 'form-control']) !!}
</div>

<!-- Vendedor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vendedor', 'Vendedor:') !!}
    {!! Form::number('vendedor', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cotizaciones.index') !!}" class="btn btn-default">Cancel</a>
</div>
