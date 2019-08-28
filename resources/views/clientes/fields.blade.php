<div class="form-body" style="">    
<h4 class="form-section"><i class="ft-user"></i> Informacion General</h4>                    
<div class="row">
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Nombre</label>
      <div class="col-md-9">
      {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Nombre corto</label>
      <div class="col-md-9">
        {!! Form::text('nombre_corto', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>  
</div>
<div class="row">
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Pais</label>
      <div class="col-md-9">
      <select class="form-control" name="pais" id="pais">
        <option value="">Seleccione una opci&oacute;n</option>
        <option value="1" selected="">M&eacute;xico</option>
      </select>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Estado</label>
      <div class="col-md-9">
        <select class="form-control select2" name="estado" id="estado" onchange="get_municipios('estado','municipio')">
          <option value="">Seleccione una opcion</option>
          @foreach($estados as $estado)
          <option value="{{ $estado->id}}">{{ $estado->estado}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Municipio</label>
      <div class="col-md-9">
      <select class="form-control select2" name="municipio" id="municipio">
          <option value="">Seleccione una opcion</option>
        </select>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Calle</label>
      <div class="col-md-9">
      {!! Form::text('calle', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Codigo postal</label>
      <div class="col-md-9">
        {!! Form::text('cp', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
    
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Numero</label>
      <div class="col-md-9">
        {!! Form::text('numero', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>  
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="empresa">Proveedor</label>
      <div class="col-md-9">
        {!! Form::number('id_proveedor', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Termino pago</label>
      <div class="col-md-9">
      {!! Form::text('terminopago', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
</div>
<h4 class="form-section"><i class="ft-user"></i> Contacto compras</h4>                    
<div class="row">
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Nombre</label>
      <div class="col-md-9">
      {!! Form::text('compra_nombre', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Telefono</label>
      <div class="col-md-9">
        {!! Form::text('telefono', null, ['class' => 'form-control phone-inputmask']) !!}
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Correo</label>
      <div class="col-md-9">
      {!! Form::text('correo_compra', null, ['class' => 'form-control email-inputmask']) !!}
      </div>
    </div>
  </div>
</div>
<h4 class="form-section"><i class="ft-mail"></i> Contacto Recepción Facturas</h4>
<div class="row">
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Nombre</label>
      <div class="col-md-9">
      {!! Form::text('recepcion_nombre', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Telefono</label>
      <div class="col-md-9">
        {!! Form::text('recepcion_telefono', null, ['class' => 'form-control phone-inputmask']) !!}
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Correo</label>
      <div class="col-md-9">
      {!! Form::text('recepcion_correo', null, ['class' => 'form-control email-inputmask']) !!}
      </div>
    </div>
  </div>
</div>
<h4 class="form-section"><i class="ft-mail"></i> Contacto Recepción Facturas</h4>
<div class="row">
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Nombre</label>
      <div class="col-md-9">
      {!! Form::text('fac_nombre', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
   <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Pais</label>
      <div class="col-md-9">
        <select class="form-control" name="fac_pais" id="fac_pais">
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
        <select class="form-control select2" name="fac_estado" id="fac_estado" onchange="get_municipios('fac_estado','fac_municipio')">
          <option value="">Seleccione una opcion</option>
          @foreach($estados as $estado)
          <option value="{{ $estado->id}}">{{ $estado->estado}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Municipio</label>
      <div class="col-md-9">
        <select class="form-control select2" name="fac_municipio" id="fac_municipio">
          <option value="">Seleccione una opcion</option>
        </select>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Calle</label>
      <div class="col-md-9">
      {!! Form::text('fac_calle', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Numero</label>
      <div class="col-md-9">
        {!! Form::text('fac_numero', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>  
</div>
<div class="row">
   <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Codigo postal</label>
      <div class="col-md-9">
        {!! Form::text('fac_cp', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  
</div>

<h4 class="form-section"><i class="ft-mail"></i> Contacto Recepción de documentos</h4>
<div class="row">
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Nombre</label>
      <div class="col-md-9">
      {!! Form::text('doc_nombre', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Correo</label>
      <div class="col-md-9">
        {!! Form::text('doc_correo', null, ['class' => 'form-control email-inputmask']) !!}
      </div>
    </div>
  </div>
</div>
<h4 class="form-section"><i class="ft-mail"></i> Impuesto</h4>
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Porcentaje </label>
      <div class="col-md-9">
        {!! Form::text('imp_porcentaje', null, ['class' => 'form-control percentage-inputmask']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">No. Certifcado </label>
      <div class="col-md-9">
      {!! Form::number('imp_nocertificado', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-6">
    
      <div class="col-md-12 skin skin-flat">
        <fieldset>
          <input type="checkbox" id="imp_factura" name="imp_factura">
          <label for="input-15">Facturación con Impuesto Sobre la Venta</label>
        </fieldset>
      </div>
    
  </div>
</div>

</div>

<div class="form-actions right">
  <a href="{{ route('clientes.index') }}">
<button type="button" class="btn btn-warning mr-1">
  <i class="ft-x"></i> Cancel
</button>
</a>
<button type="submit" class="btn btn-primary">
  <i class="fa fa-check-square-o"></i> Guardar
</button>
</div>

