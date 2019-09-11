<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $actividades->id !!}</p>
</div>

<!-- Actividad Field -->
<div class="form-group">
    {!! Form::label('actividad', 'Actividad:') !!}
    <p>{!! $actividades->actividad !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $actividades->descripcion !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $actividades->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $actividades->updated_at !!}</p>
</div>

