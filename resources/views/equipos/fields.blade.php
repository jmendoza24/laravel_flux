<div class="form-body" style="">                        
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="descripcion">Nombre</label>
      <div class="col-md-9">
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="familia">Marca</label>
      <div class="col-md-9">          
          {!! Form::text('marca', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="empresa">Modelo</label>
      <div class="col-md-9">
        {!! Form::text('modelo', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Serie</label>
      <div class="col-md-9">
        {!! Form::text('serie', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Pedimento</label>
      <div class="col-md-9">
        {!! Form::text('pedimento', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Id equipo</label>
      <div class="col-md-9">
       {!! Form::number('idequipo', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Tipo</label>
      <div class="col-md-9">
        {!! Form::number('tipo', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Calibracion</label>
      <div class="col-md-9">
        {!! Form::text('base', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Base</label>
      <div class="col-md-9">
        {!! Form::text('calibracion', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
</div>

</div>
<div class="form-actions right">
  <a href="{{ route('equipos.index') }}">
<button type="button" class="btn btn-warning mr-1">
  <i class="ft-x"></i> Cancel
</button>
</a>
<button type="submit" class="btn btn-primary">
  <i class="fa fa-check-square-o"></i> Guardar
</button>
</div>
