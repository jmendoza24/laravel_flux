<table class="table table-bordered">
    <thead class="" style="background: #518a87; border: 1px solid #518a87; color: white;">
      <tr>
        <th>Número parte</th>
        <!--<th>Descripción</th>-->
        <th>Cantidad</th>
        <th>Costo produccion</th>
        <th>Costo material</th>
        <th>Total</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @php($total = 0)
      @foreach($detalle as $det)
      @php($total += $det->costo_produccion * $det->cantidad)
      <tr>
        <td>{{ $det->descripcion}}</td>
        <!--<td></td>--->
        <td><input type="number" style="text-align: right;" name="cantidad{{$det->idc}}" id="cantidad{{$det->idc}}" class="form-control" min="1" value="{{ $det->cantidad}}" onchange="actualiza_producto({{ $det->idc}})"></td>
        <td style="text-align: right;">${{ number_format($det->costo_produccion,2)}}</td>
        <td style="text-align: right;">${{ number_format($det->costo_material,2)}}</td>
        <td style="text-align: right;">${{ number_format($det->costo_produccion * $det->cantidad,2)}}</td>
        <th>
          <a class='btn btn-float btn-outline-danger btn-round' onclick="borra_producto({{ $det->idc}})"><i class="fa fa-trash"></i></a>
        </th>
      </tr>
      @endforeach
      <tr>
        <td colspan="6" style="background: #518a87;"></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: right;"><b>Total</b></td>
        <td colspan="2" style="text-align: right;"><b>${{ number_format($total,2) }}</b></td>
        <td></td>
      </tr>
    </tbody>
  </table>