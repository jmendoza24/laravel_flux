<table class="table table-bordered">
    <thead class="" style="background: #518a87; border: 1px solid #518a87; color: white;">
      <tr>
        <th>Número parte</th>
        @if($editar ==1)
        <td>Incremento</td> 
        @endif
        <th>Descripción</th>
        <th>Familia</th>
        <th>Id Dibujo</th>
        @if($editar ==0)
        <th>Cantidad</th>
        @endif
        <th>Tiempo entrega (dias)</th>
        @if($editar ==0)
        <th>Costo unitario</th>
        <th>Precio unitario</th>
        @endif
        @if($editar ==1)
        <th>Planta</th>
        <th>Fecha entrega</th>
        @endif
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($detalle as $det)
      <tr>
        <td>{{ $det->numero_parte }}</td>
        @if($editar ==1)
        <td><input type="text" name="incremento" id="incremento{{$det->id}}" value="{{ $det->incremento }}" class="form-control" onchange="actualiza_producto_occ2({{ $det->id}},{{ $ordenesCompra->id }})"></td>
        @endif
        <td>{{ $det->descripcion}}</td>
        <td>{{ $det->nfamilia }}</td>
        <td>{{ $det->dibujo_nombre}}</td>
        @if($editar ==0)
        <td><input type="number" style="text-align: right;" name="cantidad{{$det->id}}" id="cantidad{{$det->id}}" class="form-control" min="1" value="{{ $det->cantidad}}" onchange="actualiza_producto_occ({{ $det->id}},{{ $ordenesCompra->id }})"></td>
        @endif
        <td style="text-align: center;">{{ $det->tiempo_entrega }}</td>
        @if($editar ==0)
        <td style="text-align: right;">${{ number_format($det->costo_produccion,2)}}</td>
        <td style="text-align: right;">${{ number_format($det->costo_material,2)}}</td>
        @endif
        @if($editar ==1)
        <td>
          <select class="form-control select2" id="planta{{$det->id}}" style="width: 150px;" onchange="actualiza_producto_occ2({{ $det->id}},{{ $ordenesCompra->id }})">
            <option value="0">Seleccione...</option>
            @foreach($plantas as $planta)
              <option value="{{$planta->id}}" {{($planta->id==$det->planta) ? 'selected':'' }}>{{$planta->nombre}}</option>
            @endforeach
          </select>
        </td>
        <td>
          <input type="date" id="fecha_entrega{{$det->id}}" class="form-control" value="{{$det->fecha_entrega}}" onchange="actualiza_producto_occ2({{ $det->id}},{{ $ordenesCompra->id }})">
        </td>
        @endif
        <td>
          <div class="btn-group">
            @if($editar ==1 && $det->incremento==1 and $det->cantidad > 1 and $det->conteo < $det->cantidad)
            <a class='btn btn-float btn-outline-info btn-round' onclick="agrega_subproducto({{ $det->id}},{{ $ordenesCompra->id }})"><i class="fa fa-plus"></i></a>
            @endif
            @if($det->incremento >1)
            <a class='btn btn-float btn-outline-danger btn-round' onclick="borra_producto_occ({{ $det->id}},{{ $ordenesCompra->id }})"><i class="fa fa-trash"></i></a>
            @endif
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>