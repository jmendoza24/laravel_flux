<table class="table table-bordered">
    <thead class="" style="background: #518a87; border: 1px solid #518a87; color: white;">
      <tr>
        <th>Número parte</th>
        <th>Descripción</th>
        <th>Familia</th>
        <th>Id Dibujo</th> 
        <th>Cantidad</th>
        <th>Tiempo entrega (dias)</th>
        <th>Costo unitario</th>
        <th>Precio unitario</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($detalle as $det)
      <tr>
        <td>{{ $det->numero_parte }}</td>
        <td>{{ $det->descripcion}}</td>
        <td>{{ $det->nfamilia }}</td>
        <td>{{ $det->dibujo_nombre}}</td>
        <td><input type="number" style="text-align: right;" name="cantidad{{$det->id}}" id="cantidad{{$det->id}}" class="form-control" min="1" value="{{ $det->cantidad}}" onchange="actualiza_producto({{ $det->id}})"></td>
        <td style="text-align: center;">{{ $det->tiempo_entrega }}</td>
        <td style="text-align: right;">${{ number_format($det->costo_produccion,2)}}</td>
        <td style="text-align: right;">${{ number_format($det->costo_material,2)}}</td>
        <td>
          <a class='btn btn-float btn-outline-danger btn-round' onclick="borra_producto({{ $det->id}})"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>