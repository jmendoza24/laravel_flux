@if(!empty($logisticas_fields->id))
<div class="modal-body">
@endif
  
    <input type="hidden" id="id_logistica" value="{{ $logisticas_fields->id}}">
    <input type="hidden" id="id_producto" value="{{ $logisticas_fields->id_producto}}">
    <input type="hidden" name="nombre_log" id="nombre_log" class="form-control" value="0">
  <!-- <div class="row">
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
    </div>--->
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
              <input type="text" name="calle_log" id="calle_log" class="form-control" value="{{ $logisticas_fields->calle}}" placeholder='Calle'>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
            <input type="number" min="0" name="numero_log" id="numero_log" class="form-control" value="{{ $logisticas_fields->numero}}" placeholder='Numero'>
          </div>
        </div>
      </div>      
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
          <select class="form-control" name="pais_log" style="width: 100%;" id="pais_log" onchange="get_estados('pais_log','estado_log')">
            <option value="">Pais</option>
            @foreach($paises as $pais)
              <option value="{{ $pais->id}}" 
                @if(!empty($logisticas_fields->pais))
                  {{ ($logisticas_fields->pais == $pais->id) ? 'selected' : '' }}
                @endif >
                {{ $pais->nombre}}</option>
              @endforeach
          </select>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
              <select class="form-control" style="width: 100%;" name="estado_log" id="estado_log" >
                <option value="">Estado</option>
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
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
              <input type="text"  class="form-control" placeholder="Municipio"  name="municipio_log" id="municipio_log" value="{{ $logisticas_fields->municipio}}">
          </div>
        </div>
      </div>           
      <div class="col-md-6">
        <div class="form-group row">
          <div class="col-md-12">
            <input type="text" name="cp_log" id="cp_log" class="form-control" value="{{ $logisticas_fields->cp}}" placeholder='Codigo postal'>
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
    </div>
  
@if(!empty($logisticas_fields->id))
</div>

<div class="modal-footer">
  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cancelar</button>
  <button type="button" class="btn btn-outline-primary" onclick="actualiza_direccion()">Guardar</button>
</div>
@endif

