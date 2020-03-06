 <div class="row">
    <div class="col-md-12">
      <h5>Datos del cliente</h5>
      <hr>
    </div>
    <table style="width: 100%;" border="0">
      <tr>
        <td style="width: 20%;"><label class="label-control" for="descripcion"><b style="color: red;">*</b> Ciente:</label></td>
        <td  style="width: 30%;">
              @if($nuevo ==0)
              <label id="numproveedor">{{ $ordenesCompra->nombre_corto}}</label>
               @else
               <select class="form-control" style="width: 100%;" name="cliente"  id="cliente" onchange="obtiene_producto_ot({{ $ordenesCompra->id }})">
                      <option value="">Seleccione una opcion</option>
                      @foreach($clientes as $cliente)
                      <option value="{{ $cliente->id}}" 
                        @if(!empty($ordenesCompra->cliente))
                          {{ ($ordenesCompra->cliente == $cliente->id) ? 'selected' : '' }}
                        @endif >
                        {{ $cliente->nombre_corto}}
                      </option>
                    @endforeach
                </select>
            @endif
        </td>
        <td  style="width: 25%;"><label class="label-control" for="descripcion">Contacto compra:</label></td>
        <td  style="width: 25%;"><label id="clientenombre">{{ $ordenesCompra->nombre_corto}}</label></td>
      </tr>
      <tr>
        <td><label class="label-control" for="descripcion"><b style="color: red;">*</b> OCC:</label></td>
        <td>
              <input type="text" id="orden_compra" {{ $ordenesCompra->tipo==3?'disabled':'' }} onchange="actualiza_info_occ({{ $ordenesCompra->id }})" value="{{$ordenesCompra->orden_compra}}" class="form-control" {{ ($editar ==1)?'disabled':''}} />
        </td>
        <td><label class="label-control" for="descripcion">Email  compra:</label></td>
        <td>
              <label id="email">{{$ordenesCompra->correo_compra}}</label> 
        </td>
      </tr>
      <tr>
        <td><label class="label-control" for="descripcion" ><b style="color: red;">*</b> Shipping to:</label></td>
        <td colspan="3">
              <select class="form-control" id="shipping_id" {{($editar ==1)?'disabled':''}} {{ $ordenesCompra->tipo==3?'disabled':'' }} onchange="actualiza_info_occ({{ $ordenesCompra->id }})">
                <option value="">Seleccione...</option>
                @foreach($logisticas as $logistica)
                <option value="{{$logistica->id}}" {{($ordenesCompra->shipping==$logistica->id)?'selected':'' }}>
                  {{$logistica->calle . ', ' .$logistica->municipio .', '. $logistica->nestado .', '. $logistica->npais}}
                </option>
                @endforeach
              </select>
        </td>
      </tr>
    </table>
  </div>
  
  <hr/>
@if($nuevo==1)
<div class="row">
  <div class="form-group form-inline">
    <label>Producto&nbsp;</label>
        <select class="form-control" name="producto" id="producto">
          <option value="">Seleccione una opcion</option>
          @foreach($productos as $prod)
          <option value="{{ $prod->id}}" 
            @if(!empty($ordenesCompra->producto))
              {{ ($cotizacion->producto == $prod->id) ? 'selected' : '' }}
            @endif >
            {{ $prod->numero_parte}}
          </option>
          @endforeach
        </select>&nbsp;
        <input type="number" name="cantidad_p" id="cantidad_p" class="form-control" value="1">&nbsp;
    <button class="btn btn-primary" onclick="agrega_producto_ot({{ $ordenesCompra->id }})">Agregar</button>
  </div>
</div>
@endif
<div class="row" style="margin-top: 5px; overflow: scroll;" id="">
<table class="table table-bordered">
    <thead class="" style="background: #518a87; border: 1px solid #518a87; color: white;">
      <tr>
        @if($editar==0 || $nuevo == 1)
          <td>Item</td> 
          <th>Número parte</th>
          <th>Descripción</th>
          <th>Familia</th>
          <th>Id Dibujo</th>
          <th>Tiempo entrega (días)</th>
          <th>Costo unitario</th>
          <th>Precio unitario</th>
          <th>Fecha entrega</th>
          <th>Notas</th>
          <th></th>
        @endif
        @if($editar==1)
          <td>Item</td> 
          <th>Número parte</th>
          <th>Descripción</th>
          <th>Familia</th>
          <th>Fecha entrega</th>
          <th>Tiempo entrega (días)</th>
          <th>Planta</th>
         @endif
        
      </tr>
    </thead>
    <tbody>
      @foreach($detalle as $det)
      @if($editar==0 || $nuevo == 1)
        <tr>
            <td>
              <input type="text" style="width: 60px;" {{ $ordenesCompra->tipo==3?'disabled':'' }} name="incremento" id="incremento{{$det->id}}" value="{{ $det->incremento }}" class="form-control" onchange="actualiza_producto_occ2({{ $det->id}},{{ $ordenesCompra->id }})">
          </td>
          <td>{{ $det->numero_parte }}</td>
          <td>{{ $det->descripcion}}</td>
          <td>{{ $det->nfamilia }}</td>
          <td>{{ $det->dibujo_nombre}}</td>
          <td style="text-align: center;">{{ $det->tiempo_entrega }}</td>
          
          <td style="text-align: right;">${{ number_format($det->costo_material,2)}}</td>
          <td style="text-align: right;">${{ number_format($det->costo_produccion,2)}}</td>
          <td>
            <input type="date" id="fecha_entrega{{$det->id}}" class="form-control" value="{{$det->fecha_entrega}}" onchange="actualiza_producto_occ2({{ $det->id}},{{ $ordenesCompra->id }})">
          </td>
          <td>
            <textarea class="form-control" style="width: 200px;" id="notas_det" onchange="actualiza_producto_occ2({{ $det->id}},{{ $ordenesCompra->id }})">{{$det->nota_det}}</textarea>
          </td>
          <td>
            <a class='btn btn-float btn-outline-danger btn-round' onclick="borra_producto_occ({{ $det->id}},{{ $ordenesCompra->id }})"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        @endif
        @if($editar==1)
          <tr>
            <td>{{ $det->incremento }}</td>
            <td>{{ $det->numero_parte }}</td>
            <td>{{ $det->descripcion}}</td>
            <td>{{ $det->nfamilia }}</td>
            <td>{{$det->fecha_entrega}}</td>
            <td>{{ $det->tiempo_entrega }}</td>
            <td>
              <select class="form-control select2" id="planta{{$det->id}}" style="width: 150px;" onchange="actualiza_producto_occ2({{ $det->id}},{{ $ordenesCompra->id }})">
                <option value="0">Seleccione...</option>
                @foreach($plantas as $planta)
                  <option value="{{$planta->id}}" {{($planta->id==$det->planta) ? 'selected':'' }}>{{$planta->nombre}}</option>
                @endforeach
              </select>
            </td>
          </tr>
        @endif

      @endforeach
    </tbody>
  </table>
</div>
 <div class="row ">
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4"><b style="color: red;">*</b> Incoterms : </label>
        <select class="form-control custom-select required" {{ $ordenesCompra->tipo==3?'disabled':'' }} {{($editar ==1)?'disabled':''}} style="width: 100%;"name="income" id="income" onchange="actualiza_info_occ({{ $ordenesCompra->id }})">
            <option value="">Seleccione una opcion</option>
            @foreach($income as $inco)
            <option value="{{ $inco->id}}" 
              @if(!empty($ordenesCompra->income))
                {{ ($ordenesCompra->income == $inco->id) ? 'selected' : '' }}
              @endif >
              {{ $inco->income}}
            </option>
            @endforeach
          </select>
      </div>
    </div> 
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4"><b style="color: red;">*</b> Lugar : </label>
        <input type="text" {{($editar ==1)?'disabled':''}} {{ $ordenesCompra->tipo==3?'disabled':'' }} class="form-control" id="lugar" name="lugar" onchange="actualiza_info_occ({{ $ordenesCompra->id }})" value="<?php echo ($ordenesCompra->lugar);?>">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Términos : </label>
        <textarea class="form-control" {{($editar ==1)?'disabled':''}} {{ $ordenesCompra->tipo==3?'disabled':'' }} {{($nuevo ==1)?'disabled':''}} style="height: 200px;"  onchange="actualiza_info_occ({{ $ordenesCompra->id }})" ><?php echo nl2br($ordenesCompra->desc_inco)?></textarea>
      </div>
    </div> 
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Notas : </label>
        <textarea class="form-control" id="notas" {{($editar ==1)?'disabled':''}} {{ $ordenesCompra->tipo==3?'disabled':'' }} style="height: 200px;" name="notas" onchange="actualiza_info_occ({{ $ordenesCompra->id }})" ><?php echo ($ordenesCompra->notas);?></textarea>
      </div>
    </div> 
    <br>
    
  </div>