@if(!empty($equipoHistorials->id) || !empty($equipoHistCorrect->id) || !empty($equipoHistPrev->id))
<div class="modal-body">
@endif
{{ var_dump($equipoHistorials)}}
<input type="hidden" id="id_historia" value="">
<input type="text" id="id_tipo" value="{{old('id_tipo', $equipoHistorials->historial_tipo, $equipoHistCorrect->historial_tipo, $equipoHistPrev->historial_tipo)}}">

<!-- Historial Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('historial_tipo', 'Historial Tipo:') !!}
    {!! Form::text('historial_tipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Responsable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsable', 'Responsable:') !!}
    {!! Form::text('responsable', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Vencimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vencimiento', 'Vencimiento:') !!}
    {!! Form::date('vencimiento', null, ['class' => 'form-control','id'=>'vencimiento']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#vencimiento').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}
    {!! Form::text('activo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('equipoHistorials.index') !!}" class="btn btn-default">Cancel</a>
</div>
