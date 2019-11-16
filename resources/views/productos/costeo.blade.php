<table class="table table-bordered table-striped">
  <tr style="background: #518a87; color: white;">
      <td colspan="3">Información de costeo</td>
  </tr>
  <tr>
    <td>Id Dibujo</td>
    <td>{{ $info_producto->dibujo_nombre }}</td>
    <td> @if($info_producto->dibujo_nombre != '')
          <span class="badge badge-default badge-primary">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No válido</span>
          @endif
    </td>
  </tr>
  <tr>
    <td>Revisión</td>
    <td>{{ $info_producto->revision }}</td>
    <td>
      @if($info_producto->revision != '')
          <span class="badge badge-default badge-primary">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No válido</span>
          @endif
    </td>
  </tr>
  <tr>
    <td>Procesos </td>
    <td> 
      <?php echo ($info_pro !='[]') ?  $info_pro :'';?>  
    </td>
    <td>
       @if(!empty($info_pro))
          <span class="badge badge-default badge-primary">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No válido</span>
          @endif
    </td>
  </tr>
  <!--<tr>
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
          <span class="badge badge-default badge-primary">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif

    </td>
  </tr>--->
  <tr>
    <td>Horas hombre</td>
    <td>{{ $info_producto->sumahora }} horas</td>
    <td>
        @if(!empty($info_producto->sumahora))
          <span class="badge badge-default badge-primary">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No válido</span>
          @endif

    </td>
  </tr>
 <!-- <tr>
    <td>Costo unitario</td>
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
    <td>Precio unitario</td>
    <td>${{ number_format($info_producto->costo_produccion,2) }}</td>
    <td></td>
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
    <td>Tiempo de manufactura(dias)</td>
    <td>{{ $info_producto->tiempo_entrega   }}</td>
    <td>
        @if($info_producto->tiempo_entrega != '')
          <span class="badge badge-default badge-success">Ok</span>
          @else
          <span class="badge badge-default badge-warning">No valido</span>
          @endif
    </td>
  </tr>  -->
   
</table>