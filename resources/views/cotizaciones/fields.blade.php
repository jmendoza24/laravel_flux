@section('titulo')
    Cotización FX-000{{ $num_cotizacion }} | <b>Fecha :</b> {{  date("m-d-Y", strtotime($cotizacion->fecha)) }}
@endsection
  <div class="row ">
    <div class="col-md-5">
      <div class="form-group">
        <label for="lastName4">Cliente : </label>
        <input type="hidden" id="cliente_cot" value="{{$cotizacion->cliente}}">
        <select class="custom-select required form-control" style="width: 100%;" name="cliente" id="cliente" onchange="obtiene_producto()">
            <option value="">Seleccione una opcion</option>
            @foreach($clientes as $cliente)
            <option value="{{ $cliente->id}}" 
              @if(!empty($cotizacion->cliente))
                {{ ($cotizacion->cliente == $cliente->id) ? 'selected' : '' }}
              @endif >
              {{ $cliente->nombre_corto}}
            </option>
            @endforeach
          </select>
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group">
        <label for="lastName4">Piezas : </label>
        <select class="form-control custom-select" style="width: 100%;"name="producto" id="producto">
            <option value="">Seleccione una opcion</option>
            @foreach($productos as $prod)
            <option value="{{ $prod->id}}" 
              @if(!empty($cotizacion->producto))
                {{ ($cotizacion->producto == $prod->id) ? 'selected' : '' }}
              @endif >
              {{ $prod->numero_parte}}
            </option>
            @endforeach
          </select>
      </div>
    </div>
    <div class="col-md-2">
        <a class="btn btn-primary" style="margin-top: 25px; color: white;" onclick="agrega_producto()" >Agregar</a>
    </div>
    <br>
    
  </div>
  
  <div class="row">
    <div class="col-md-12">
      <br/>
      <h5>Datos del cliente</h5>
      <hr>
    </div>
    <div class="col-md-6">
      <p><b>Cliente:</b> <label id="clientenombre">{{ $cotizacion->nombre_corto}}</label> </p>
      <!--<p><b>Nombre contacto:</b> <label id="numproveedor">{{ $cotizacion->id_proveedor}}</label> </p>-->
    </div>
    <div class="col-md-6">
      <p><b>Nombre contacto:</b> <label id="telefono">{{$cotizacion->compra_nombre}}</label> </p>
      <p><b>Email contacto:</b> <label id="email">{{$cotizacion->correo_compra}}</label> </p>
      
    </div>
  </div>
  <hr>
  <div class="row" style="margin-top: 5px; overflow: scroll;" id="detalle_cotiza">
    @include('cotizaciones.detalle')
  </div>
  
  <div class="row ">
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Inco terms : </label>
        <select class="form-control custom-select required" style="width: 100%;"name="income" id="income" onchange="guarda_informacion({{ $num_cotizacion }})">
            <option value="">Seleccione una opcion</option>
            @foreach($income as $inco)
            <option value="{{ $inco->id}}" 
              @if(!empty($cotizacion->income))
                {{ ($cotizacion->income == $inco->id) ? 'selected' : '' }}
              @endif >
              {{ $inco->income}}
            </option>
            @endforeach
          </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Lugar : </label>
        <input type="text" class="form-control" id="lugar" name="lugar" onchange="guarda_informacion({{ $num_cotizacion }})" value="<?php  echo $cotizacion->lugar; ?>">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label for="lastName4">Notas : </label>
        <textarea class="form-control" id="notas" style="height: 200px;" name="notas" onchange="guarda_informacion({{ $num_cotizacion }})"><?php  if($cotizacion->id_notas==''){
                                                                  echo ($condiciones[0]->condicion);
                                                                }else{
                                                                   echo ($cotizacion->id_notas);
                                                                 } ?></textarea>
      </div>
    </div>
    <br>
    
  </div>
  <hr>
  <div class="form-group col-sm-12" style="text-align: right;">
    <div class="btn-group mr-1 mb-1">
        <button type="button" class="btn btn-primary btn-min-width dropdown-toggle" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">Seleccione una acción</button>
        <div class="dropdown-menu">
          <a onclick="validation_cotizacion(2)" class="dropdown-item">Guardar</a>
          <a onclick="validation_cotizacion(1)"  class="dropdown-item">Enviar</a>
          <a class="dropdown-item" onclick="convierte_occ({{$cotizacion->id}},2)">Crear OT</a>
          <div class="dropdown-divider"></div>
          <a href="/historiaCotizacion" class="dropdown-item">Regresar</a>
        </div>
      </div>
    
    
</div>
