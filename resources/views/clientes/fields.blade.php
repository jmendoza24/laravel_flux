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
      <label class="col-md-3 label-control" for="userinput2">Calle</label>
      <div class="col-md-9">
      {!! Form::text('calle', null, ['class' => 'form-control']) !!}
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
      <label class="col-md-3 label-control" for="userinput2">Pais</label>
      <div class="col-md-9">
      {!! Form::text('pais', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Estado</label>
      <div class="col-md-9">
        {!! Form::text('estado', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Municipio</label>
      <div class="col-md-9">
      {!! Form::text('municipio', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Codigo postal</label>
      <div class="col-md-9">
        {!! Form::text('cp', null, ['class' => 'form-control']) !!}
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
    <div class="col-md-12">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Nombre</label>
      <div class="col-md-9">
      {!! Form::text('fac_nombre', null, ['class' => 'form-control']) !!}
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
      <label class="col-md-3 label-control" for="userinput2">Pais</label>
      <div class="col-md-9">
      {!! Form::text('fac_pais', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Estado</label>
      <div class="col-md-9">
        {!! Form::text('fac_estado', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput2">Municipio</label>
      <div class="col-md-9">
      {!! Form::text('municipio', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-md-3 label-control" for="userinput1">Codigo postal</label>
      <div class="col-md-9">
        {!! Form::text('fac_cp', null, ['class' => 'form-control']) !!}
      </div>
    </div>
  </div>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('doc_nombre', 'Doc Nombre:') !!}
    {!! Form::text('doc_nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Doc Correo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('doc_correo', 'Doc Correo:') !!}
    {!! Form::text('doc_correo', null, ['class' => 'form-control']) !!}
</div>

<!-- Imp Factura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imp_factura', 'Imp Factura:') !!}
    {!! Form::number('imp_factura', null, ['class' => 'form-control']) !!}
</div>

<!-- Imp Porcentaje Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imp_porcentaje', 'Imp Porcentaje:') !!}
    {!! Form::number('imp_porcentaje', null, ['class' => 'form-control']) !!}
</div>

<!-- Imp Nocertificado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imp_nocertificado', 'Imp Nocertificado:') !!}
    {!! Form::number('imp_nocertificado', null, ['class' => 'form-control']) !!}
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

