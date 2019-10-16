@section('titulo')
    Cotización FX-000{{ $num_cotizacion }} | <b>Fecha :</b> {{ date('Y-m-d') }}
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
              {{ $prod->descripcion}}
            </option>
            @endforeach
          </select>
      </div>
    </div>
    <div class="col-md-2">
        <a class="btn btn-info" style="margin-top: 25px; color: white;" onclick="agrega_producto()" >Agregar</a>
    </div>
    <br>
    
  </div>
  <hr>

  <div class="row" style="margin-top: 5px; overflow: scroll;" id="detalle_cotiza">
    @include('cotizaciones.detalle')
  </div>
  <hr>
  <div class="row ">
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Notas : </label>
        <textarea class="form-control" id="notas" name="notas"><?php  if($cotizacion->notas==''){
                                                                  echo nl2br($condiciones[0]->condicion);
                                                                }else{
                                                                   echo nl2br($cotizacion->notas);
                                                                 } ?></textarea>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Income terms : </label>
        <select class="form-control custom-select required" style="width: 100%;"name="income" id="income">
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
    <a href="" class="btn btn-primary">Enviar cotización</a>
</div>
