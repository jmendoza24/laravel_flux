<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $equipoHistorial->id !!}</p>
</div>

<!-- Historial Tipo Field -->
<div class="form-group">
    {!! Form::label('historial_tipo', 'Historial Tipo:') !!}
    <p>{!! $equipoHistorial->historial_tipo !!}</p>
</div>

<!-- Responsable Field -->
<div class="form-group">
    {!! Form::label('responsable', 'Responsable:') !!}
    <p>{!! $equipoHistorial->responsable !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $equipoHistorial->descripcion !!}</p>
</div>

<!-- Vencimiento Field -->
<div class="form-group">
    {!! Form::label('vencimiento', 'Vencimiento:') !!}
    <p>{!! $equipoHistorial->vencimiento !!}</p>
</div>

<!-- Activo Field -->
<div class="form-group">
    {!! Form::label('activo', 'Activo:') !!}
    <p>{!! $equipoHistorial->activo !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $equipoHistorial->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $equipoHistorial->updated_at !!}</p>
</div>

