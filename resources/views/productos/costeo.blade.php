<table class="table table-bordered table-striped">
  <tr style="background: #518a87; color: white;">
      <td colspan="3">Información de costeo</td>
  </tr>
  <tr>
    <td>Dibujo actual</td>
    <td>{{ $info_producto->dibujo_nombre }}</td>
    <td> @if($info_producto->dibujo_nombre != '')
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif
    </td>
  </tr>
  <tr>
    <td>Revision</td>
    <td>{{ $info_producto->revision }}</td>
    <td>
      @if($info_producto->revision != '')
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif
    </td>
  </tr>
  <tr>
    <td>Pasos de producción </td>
    <td> 
      <?php echo ($info_pro !='[]') ?  $info_pro :'';?>  
    </td>
    <td>
       @if(!empty($info_pro))
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif
    </td>
  </tr>
  <tr>
    <td>Familia </td>
    <td>{{ $info_producto->nfamilia }}</td>
    <td>
      @if(!empty($info_producto->nfamilia))
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif

    </td>
  </tr>
  <tr>
    <td>Materiales </td>
    <td>
      <?php echo ($info_mat !='[]') ?  $info_mat :'';?> 
    </td>
    <td>
        @if(!empty($info_mat))
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif

    </td>
  </tr>
  <tr>
    <td>Horas hombre</td>
    <td>{{ $info_producto->sumahora }} horas</td>
    <td>
        @if(!empty($info_producto->sumahora))
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif

    </td>
  </tr>
  <tr>
    <td>Precio unitario</td>
    <td>${{ number_format($info_producto->costo_produccion,2) }}</td>
    <td>
        @if(!empty($info_producto->costo_produccion))
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif

    </td>
  </tr>
  <tr>
    <td>Precios material (dls x kilo) </td>
     <td>${{ number_format($info_producto->costo_material,2) }}</td>
    <td>
        @if(!empty($info_producto->costo_material))
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif

    </td>
  </tr>
  <tr>
    <td>Peso (libras)</td>
    <td>{{ $info_producto->peso }}</td>
    <td>
        @if($info_producto->peso!='')
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif
    </td>
  </tr>   
  <tr>
    <td>Tiempo de manufactura</td>
    <td>{{ $info_producto->tiempo_entrega   }}</td>
    <td>
        @if($info_producto->tiempo_entrega != '')
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif
    </td>
  </tr>  
  <tr>
    <td>Costo total</td>
    <td>${{ number_format($info_producto->costo_produccion,2) }}</td>
    <td></td>
  </tr>  
</table>