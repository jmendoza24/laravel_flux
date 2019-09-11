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
        <select class="form-control" name="pais" id="pais">
          <option value="">Seleccione una opci&oacute;n</option>
          <option value="1" selected="">M&eacute;xico</option>
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
        <select class="form-control select2" name="estado" id="estado" required="" onchange="get_municipios('estado','municipio')">
          <option value="">Seleccione una opcion</option>
              @foreach($estados as $estado)
              <option value="{{ $estado->id}}" 
                @if(!empty($proveedores->estado))
                  {{ ($proveedores->estado == $estado->id) ? 'selected' : '' }}
                @endif >
                {{ $estado->estado}}</option>
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
      <select class="form-control select2" name="municipio" required="" id="municipio">
        <option value="">Seleccione una opcion</option>
          @foreach($municipios as $muni)
              <option value="{{ $muni->id}}" 
              @if(!empty($proveedores->municipio))
                  {{ ($proveedores->municipio == $muni->id) ? 'selected' : '' }}
               @endif >
               {{ $muni->municipio}}
             </option>
            @endforeach
          </select>
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

