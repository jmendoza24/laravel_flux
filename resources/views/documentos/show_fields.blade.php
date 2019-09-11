<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $documentos->id !!}</p>
</div>

<!-- Documento Field -->
<div class="form-group">
    {!! Form::label('documento', 'Documento:') !!}
    <p>{!! $documentos->documento !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $documentos->descripcion !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $documentos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $documentos->updated_at !!}</p>
</div>

