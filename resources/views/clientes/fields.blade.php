<ul class="nav nav-tabs nav-underline no-hover-bg nav-justified">
  <li class="nav-item">
    <a class="nav-link active" id="active-tab32" data-toggle="tab" href="#active32" aria-controls="active32"
    aria-expanded="true"><i class="ft-user"></i> Información General</a>
  </li>
    @if($editar ==1)
  <li class="nav-item">
    <a class="nav-link" id="link-tab32" data-toggle="tab" href="#link32" aria-controls="link32"
    aria-expanded="false"><i class="ft-mail"></i> Contactos</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="linkOpt-tab2" data-toggle="tab" href="#linkOpt2" aria-controls="linkOpt2"><i class="fa fa-truck"></i> Logistica</a>
  </li>
  @endif
</ul>
<div class="tab-content px-1 pt-1">
  <div role="tabpanel" class="tab-pane active in" id="active32" aria-labelledby="active-tab32" aria-expanded="true">
    <div class="row">
      <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput2">Nombre</label>
            <div class="col-md-9">
            {!! Form::text('nombre', null, ['class' => 'form-control','required'=>'required']) !!}
            <div class="invalid-feedback">Este campo es requerido.</div>
            </div>
          </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput1">Nombre corto</label>
          <div class="col-md-9">
            {!! Form::text('nombre_corto', null, ['class' => 'form-control','required'=>'required']) !!}
            <div class="invalid-feedback">Este campo es requerido.</div>
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
          <label class="col-md-3 label-control" for="userinput1">Número</label>
          <div class="col-md-9">
            {!! Form::text('numero', null, ['class' => 'form-control']) !!}
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput2">País</label>
          <div class="col-md-9">
          <select class="form-control select2" name="pais" id="pais" required=""  onchange="get_estados('pais','estado')"> 
            <option value="">Seleccione una opci&oacute;n</option>
            @foreach($paises as $pais)
              <option value="{{ $pais->id}}" 
                @if(!empty($clientes->pais))
                  {{ ($clientes->pais == $pais->id) ? 'selected' : '' }}
                @endif >
                {{ $pais->nombre}}</option>
              @endforeach
          </select>
          <div class="invalid-feedback">Este campo es requerido.</div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput1">Estado</label>
          <div class="col-md-9">
            <select class="form-control select2" name="estado" id="estado" required="">
              <option value="">Seleccione una opcion</option>
              @if(!empty($estados))
              @foreach($estados as $estado)
              <option value="{{ $estado->id}}" 
                
                  {{ ($clientes->estado == $estado->id) ? 'selected' : '' }}
                 >
                {{ $estado->estado}}</option>
              @endforeach
              @endif
            </select>
            <div class="invalid-feedback">Este campo es requerido.</div>
          </div>
        </div>
      </div>
        <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput2">Ciudad</label>
          <div class="col-md-9">
            {!! Form::text('municipio', null, ['class' => 'form-control']) !!}
            <div class="invalid-feedback">Este campo es requerido.</div>
          </div>
        </div>
      </div>     
      
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput1">Código postal</label>
          <div class="col-md-9">
            {!! Form::text('cp', null, ['class' => 'form-control']) !!}
          </div>
        </div>
      </div>    
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="empresa">Número proveedor</label>
          <div class="col-md-9">
             {!! Form::text('id_proveedor', null, ['class' => 'form-control']) !!}
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput2">Término pago</label>
          <div class="col-md-9">
          {!! Form::text('terminopago', null, ['class' => 'form-control']) !!}
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="linea" id="linea" value="0">
    <!--<div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="empresa">Línea</label>
          <div class="col-md-9">
            
          </div>
          <div class="invalid-feedback">Este campo es requerido.</div>
        </div>
      </div>
    </div>--->
    <h4 class="form-section"><i class="ft-mail"></i> Impuesto</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="imp_porcentaje">Porcentaje </label>
          <div class="col-md-9">
            {!! Form::text('imp_porcentaje', null, ['class' => 'form-control percentage-inputmask']) !!}
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput2">No. Certifcado </label>
          <div class="col-md-9">
          {!! Form::text('imp_nocertificado', null, ['class' => 'form-control']) !!}
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
    <h4 class="form-section"><i class="ft-mail"></i> Marcado de piezas</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput1">Instrucciones sobre marcaje </label>
          <div class="col-md-9">
            {!! Form::textarea('nota_marcado', null, ['class' => 'form-control']) !!}
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput2">Instrucciones sobre embarques </label>
          <div class="col-md-9">
          {!! Form::textarea('nota_embarques', null, ['class' => 'form-control']) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane" id="link32" role="tabpanel" aria-labelledby="link-tab32" aria-expanded="false">
    <h4 class="form-section"><i class="ft-user"></i>Compras</h4>     
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
            {!! Form::text('compra_telefono', null, ['class' => 'form-control phone-inputmask']) !!}
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
    <h4 class="form-section"><i class="ft-mail"></i>Recepción facturas</h4> 
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
          <label class="col-md-3 label-control" for="userinput1">Teléfono</label>
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
    <h4 class="form-section"><i class="ft-mail"></i>Facturar a</h4>
    <div class="row">
      <div class="col-md-6">
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
          <label class="col-md-3 label-control" for="userinput1">Número</label>
          <div class="col-md-9">
            {!! Form::text('fac_numero', null, ['class' => 'form-control']) !!}
          </div>
        </div>
      </div>  
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput2">País</label>
          <div class="col-md-9">
            <select class="form-control select2" name="fac_pais" style="width: 100%;" id="fac_pais" onchange="get_estados('fac_pais','fac_estado')">
            <option value="">Seleccione una opci&oacute;n</option>
            @foreach($paises as $pais)
              <option value="{{ $pais->id}}" 
                @if(!empty($clientes->fac_pais))
                  {{ ($clientes->fac_pais == $pais->id) ? 'selected' : '' }}
                @endif >
                {{ $pais->nombre}}</option>
              @endforeach
          </select>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput1">Estados</label>
          <div class="col-md-9">
            <select class="form-control select2" style="width: 100%;" name="fac_estado" id="fac_estado" >
              <option value="">Seleccione una opcion</option>
              @foreach($estados as $estado)
              <option value="{{ $estado->id}}"
                 {{ ($clientes->fac_estado == $estado->id) ? 'selected' : '' }}
                >{{ $estado->estado}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
        <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput2">Ciudad</label>
          <div class="col-md-9">
            {!! Form::text('fac_municipio', null, ['class' => 'form-control']) !!}
          </div>
        </div>
      </div>
   
       
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput1">Código postal</label>
          <div class="col-md-9">
            {!! Form::text('fac_cp', null, ['class' => 'form-control']) !!}
          </div>
        </div>
      </div>
    </div>
    <h4 class="form-section"><i class="ft-mail"></i>Recepción de documentos</h4>
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
    <h4 class="form-section"><i class="ft-mail"></i>Contacto logistica</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput2">Nombre</label>
          <div class="col-md-9">
          {!! Form::text('log_nombre', null, ['class' => 'form-control']) !!}
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput1">Correo</label>
          <div class="col-md-9">
            {!! Form::text('log_correo', null, ['class' => 'form-control email-inputmask']) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
  @if($editar ==1)
  <div class="tab-pane" id="linkOpt2" role="tabpanel" aria-labelledby="linkOpt-tab2" aria-expanded="false">
    <div class="row">
      <div class="col-md-12">
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#large" style="margin-top: -10px;margin-bottom: 5px; color: white;" >+ Direcci&oacute;n</a>
        </h1>
      </div>
      <div class="col-md-12" id="logisticas" style="overflow-x: scroll;">
        @include('logisticas.table')
      </div>
    </div>
  </div>
  @endif
</div>
<div class="form-actions right">
  <a href="{{ route('clientes.index') }}">
<button type="button" class="btn btn-warning mr-1">
  <i class="ft-x"></i> Cancelar
</button>
</a>
<button type="submit" class="btn btn-primary">
  <i class="fa fa-check-square-o"></i> Guardar
</button>
</div>
@if($editar ==1)
<div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel17">+ Direcci&oacute;n de envío</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_logistica">
          <div id="campos_logistica">
            <div class="modal-body">
              @include('logisticas.fields')
            </div>
            <div class="modal-footer">
              <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-outline-primary" onclick="guarda_direccion({{ $clientes->id}})">Guardar</button>
            </div>
          </div>
      </form>
      </div>
    </div>
  </div>
  @endif