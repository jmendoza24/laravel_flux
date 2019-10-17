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
        <label for="lastName4">Producto : </label>
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
      <p><b>Nombre:</b> <label id="clientenombre">{{ $cotizacion->nombre_corto}}</label> </p>
      <p><b>Número proveedor:</b> <label id="numproveedor">{{ $cotizacion->id_proveedor}}</label> </p>
    </div>
    <div class="col-md-6">
      <p><b>Email de compra:</b> <label id="email">{{$cotizacion->correo_compra}}</label> </p>
      <p><b>Teléfono de compra:</b> <label id="telefono">{{$cotizacion->compra_telefono}}</label> </p>
    </div>
  </div>
  <hr>
  <div class="row" style="margin-top: 5px; overflow: scroll;" id="detalle_cotiza">
    @include('cotizaciones.detalle')
  </div>
  
  <div class="row ">
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Notas : </label>
        <textarea class="form-control" id="notas" name="notas" onchange="guarda_informacion({{ $num_cotizacion }})"><?php  if($cotizacion->id_notas==''){
                                                                  echo ($condiciones[0]->condicion);
                                                                }else{
                                                                   echo ($cotizacion->id_notas);
                                                                 } ?></textarea>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Income terms : </label>
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
    <br>
    
  </div>
  <hr>
  <div class="form-group col-sm-12" style="text-align: right;">
    <a href="" class="btn btn-warning mr-1">Cancelar</a>
    <a href="{{ route('cotizacion.enviar') }}"  class="btn btn-primary">Enviar cotización</a>
</div>
