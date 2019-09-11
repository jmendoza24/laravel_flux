<!-- Id Producto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_producto', 'Id Producto:') !!}
    {!! Form::number('id_producto', null, ['class' => 'form-control']) !!}
</div>

<!-- Dibujo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dibujo', 'Dibujo:') !!}
    {!! Form::text('dibujo', null, ['class' => 'form-control']) !!}
</div>

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

<!-- Revision Field -->
<div class="form-group col-sm-6">
    {!! Form::label('revision', 'Revision:') !!}
    {!! Form::number('revision', null, ['class' => 'form-control']) !!}
</div>

<!-- Tiempo Entrega Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tiempo_entrega', 'Tiempo Entrega:') !!}
    {!! Form::number('tiempo_entrega', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('productoDibujos.index') !!}" class="btn btn-default">Cancel</a>
</div>
