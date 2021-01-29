<!-- Tel Casa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tel_casa', 'Tel Casa:') !!}
    {!! Form::text('tel_casa', null, ['class' => 'form-control']) !!}
</div>

<!-- Tel Celular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tel_celular', 'Tel Celular:') !!}
    {!! Form::text('tel_celular', null, ['class' => 'form-control']) !!}
</div>

<!-- Correo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correo', 'Correo:') !!}
    {!! Form::text('correo', null, ['class' => 'form-control']) !!}
</div>

<!-- Contacto1 Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto1_nombre', 'Contacto1 Nombre:') !!}
    {!! Form::text('contacto1_nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Contacto1 Tel Casa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto1_tel_casa', 'Contacto1 Tel Casa:') !!}
    {!! Form::text('contacto1_tel_casa', null, ['class' => 'form-control']) !!}
</div>

<!-- Contacto1 Tel Celular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto1_tel_celular', 'Contacto1 Tel Celular:') !!}
    {!! Form::text('contacto1_tel_celular', null, ['class' => 'form-control']) !!}
</div>

<!-- Contacto1 Relacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto1_relacion', 'Contacto1 Relacion:') !!}
    {!! Form::text('contacto1_relacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Contacto2 Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto2_nombre', 'Contacto2 Nombre:') !!}
    {!! Form::text('contacto2_nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Contacto2 Tel Casa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto2_tel_casa', 'Contacto2 Tel Casa:') !!}
    {!! Form::text('contacto2_tel_casa', null, ['class' => 'form-control']) !!}
</div>

<!-- Contacto2 Tel Cel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto2_tel_cel', 'Contacto2 Tel Cel:') !!}
    {!! Form::text('contacto2_tel_cel', null, ['class' => 'form-control']) !!}
</div>

<!-- Contaco2 Relacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contaco2_relacion', 'Contaco2 Relacion:') !!}
    {!! Form::text('contaco2_relacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('datosPersonales.index') !!}" class="btn btn-default">Cancel</a>
</div>
