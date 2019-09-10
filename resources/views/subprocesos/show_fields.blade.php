<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $subprocesos->id !!}</p>
</div>

<!-- Idproceso Field -->
<div class="form-group">
    {!! Form::label('idproceso', 'Idproceso:') !!}
    <p>{!! $subprocesos->idproceso !!}</p>
</div>

<!-- Subproceso Field -->
<div class="form-group">
    {!! Form::label('subproceso', 'Subproceso:') !!}
    <p>{!! $subprocesos->subproceso !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $subprocesos->descripcion !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $subprocesos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $subprocesos->updated_at !!}</p>
</div>

