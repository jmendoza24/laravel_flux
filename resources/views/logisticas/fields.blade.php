@if(!empty($logisticas_fields->id))
<div class="modal-body">
@endif
  
    <input type="hidden" id="id_logistica" value="{{ $logisticas_fields->id}}">
    <input type="hidden" id="id_producto" value="{{ $logisticas_fields->id_producto}}">
  <div class="row">
      <div class="col-md-12">
          <div class="form-group row">
            <div class="col-md-12">
            <input type="text" name="nombre_log" id="nombre_log" class="form-control" value="{{ $logisticas_fields->nombre}}" placeholder='Nombre'>
            </div>
          </div>
      </div>
        
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">        
            <input type="text" name="telefono_log" id="telefono_log" class="form-control phone-inputmask" value="{{ $logisticas_fields->telefono}}" placeholder='Telefono'>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
            <input type="text" name="correo_log" id="correo_log" class="form-control email-inputmask" value="{{ $logisticas_fields->correo}}" placeholder='Correo electronico'>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
          <select class="form-control" name="pais_log" id="pais_log" >
            <option value="">Pais</option>
            <option value="1" selected="">M&eacute;xico</option>
          </select>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
              <select class="form-control select2" style="width: 100%;" name="estado" id="estado_log" onchange="get_municipios('estado_log','municipio_log')">
                <option value="">Seleccione una opcion</option>
                @foreach($estados as $estado)
                <option value="{{ $estado->id}}" 
                  @if(!empty($logisticas_fields->estado))
                    {{ ($logisticas_fields->estado == $estado->id) ? 'selected' : '' }}
                  @endif >
                  {{ $estado->estado}}</option>
                @endforeach
              </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
              <select class="form-control select2" style="width: 100%;"  name="municipio" id="municipio_log">
                <option value="">Seleccione una opcion</option>
                @foreach($municipios as $muni)
                  <option value="{{ $muni->id}}" 
                    @if(!empty($logisticas_fields->municipio))
                        {{ ($logisticas_fields->municipio == $muni->id) ? 'selected' : '' }}
                     @endif >
                     {{ $muni->municipio}}
                  </option>
                 @endforeach
              </select>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
              <input type="text" name="calle_log" id="calle_log" class="form-control" value="{{ $logisticas_fields->calle}}" placeholder='Calle'>
          </div>
        </div>
      </div>
      
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
            <input type="text" name="cp_log" id="cp_log" class="form-control" value="{{ $logisticas_fields->cp}}" placeholder='Codigo porstal'>
          </div>
        </div>
      </div>
        
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
            <input type="text" name="numero_log" id="numero_log" class="form-control" value="{{ $logisticas_fields->numero}}" placeholder='Numero'>
          </div>
        </div>
      </div>  
    </div>
  
@if(!empty($logisticas_fields->id))
</div>

<div class="modal-footer">
  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cancelar</button>
  <button type="button" class="btn btn-outline-primary" onclick="actualiza_direccion()">Guardar</button>
</div>
@endif