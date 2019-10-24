<div class="form-body" style="">                        
<div class="row">
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Nombre</label>
      <div class="col-md-9">
      {!! Form::text('nombre', null, ['class' => 'form-control','required']) !!}
      <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div>
   <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">País</label>
      <div class="col-md-9">
        <select class="form-control select2" name="pais" id="pais" onchange="get_estados('pais','estado')" >
          <option value="">Seleccione una opci&oacute;n</option>
          @foreach($paises as $pais)
              <option value="{{ $pais->id}}" 
                @if(!empty($proveedores->pais))
                  {{ ($proveedores->pais == $pais->id) ? 'selected' : '' }}
                @endif >
                {{ $pais->nombre}}</option>
              @endforeach
        </select>
      </div>
    </div>
  </div> 
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Estado</label>
      <div class="col-md-9">

        <select class="form-control select2" name="estado" id="estado" required="" >
          <option value="">Seleccione una opcion</option>
              @foreach($estados as $estado)
              <option value="">Seleccione una opción</option>
              @if(!empty($proveedores->estado))
              <option value="{{ $estado->id}}" 
                  {{ ($proveedores->estado == $estado->id) ? 'selected' : '' }}
                >
                {{ $estado->estado}}</option>
                @endif 
              @endforeach
        </select>
        <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div> 
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Municipio</label>
      <div class="col-md-9">
         {!! Form::text('municipio', null, ['class' => 'form-control']) !!}
          <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="empresa">Direcci&oacute;n</label>
      <div class="col-md-9">
        {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
   <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Código postal</label>
      <div class="col-md-9">
        {!! Form::text('cp', null, ['class' => 'form-control', 'required']) !!}
        <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div>
  
</div>
<div class="row">
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Crédito</label>
      <div class="col-md-9">
      {!! Form::text('credito', null, ['class' => 'form-control','required']) !!}
      <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">RFC</label>
      <div class="col-md-9">
      {!! Form::text('rfc', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
</div>
<h4 class="form-section"><i class="ft-mail"></i> Contacto</h4>
<div class="row">
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Teléfono</label>
      <div class="col-md-9">
        {!! Form::text('telefono', null, ['class' => 'form-control phone-inputmask']) !!}
      </div>
    </div>
  </div>
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Correo</label>
      <div class="col-md-9">
      {!! Form::text('correo', null, ['class' => 'form-control email-inputmask']) !!}
      </div>
    </div>
  </div>
</div>
<div class="row">
 <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Puesto</label>
      <div class="col-md-9">
        {!! Form::text('puesto', null, ['class' => 'form-control','required']) !!}
        <div class="invalid-feedback">Este campo es requerido.</div>
      </div>
    </div>
  </div>
</div>

</div>
<div class="form-actions right">
  <a href="{{ route('plantas.index') }}">
<button type="button" class="btn btn-warning mr-1">
  <i class="ft-x"></i> Cancel
</button>
</a>
<button type="submit" class="btn btn-primary">
  <i class="fa fa-check-square-o"></i> Guardar
</button>
</div>

