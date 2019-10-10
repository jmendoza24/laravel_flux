@foreach($info_producto as $producto)
<table class="table table-bordered table-striped">
  <tr style="background: #518a87; color: white;">
      <td colspan="3">Validación {{ $producto->numero_parte}}</td>
  </tr>
  <tr>
    <td>Dibujo actual</td>
    <td>{{ $producto->dibujo_nombre }}</td>
    <td> @if($producto->dibujo_nombre != '')
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif
    </td>
  </tr>
  <tr>
    <td>Revision</td>
    <td>{{ $producto->revision }}</td>
    <td>
      @if($producto->revision != '')
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif
    </td>
  </tr>
  <tr>
    <td>Pasos de producción </td>
    <td> 
      
    </td>
    <td>
      @if(!empty($producto->sumahora))
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif
    </td>
  </tr>
  <tr>
    <td>Familia </td>
    <td>{{ $producto->nfamilia }}</td>
    <td>
      @if(!empty($producto->nfamilia))
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif

    </td>
  </tr>
  <tr>
    <td>Materiales </td>
    <td>
     
    </td>
    <td>
     @if($producto->prodmat > 0)
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif
    </td>
  </tr>
  <tr>
    <td>Horas hombre</td>
    <td>{{ $producto->sumahora }} horas</td>
    <td>
        @if(!empty($producto->sumahora))
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif

    </td>
  </tr>
  <tr>
    <td>Precio unitario</td>
    <td>${{ number_format($producto->costo_produccion,2) }}</td>
    <td>
        @if(!empty($producto->costo_produccion))
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif

    </td>
  </tr>
  <tr>
    <td>Precios material (dls x kilo) </td>
     <td>${{ number_format($producto->costo_material,2) }}</td>
    <td>
        @if(!empty($producto->costo_material))
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif

    </td>
  </tr>
  <tr>
    <td>Peso (libras)</td>
    <td>{{ $producto->peso }}</td>
    <td>
        @if($producto->peso!='')
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif
    </td>
  </tr>   
  <tr>
    <td>Tiempo de manufactura</td>
    <td>{{ $producto->tiempo_entrega   }}</td>
    <td>
        @if($producto->tiempo_entrega != '')
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif
    </td>
  </tr>  
  <tr>
    <td>Costo total</td>
    <td>${{ number_format($producto->costo_produccion,2) }}</td>
    <td></td>
  </tr>  
</table>
@endforeach