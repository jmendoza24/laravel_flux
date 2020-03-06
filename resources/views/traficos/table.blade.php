<table class="table table-bordered table-striped" id="trafico_seg">
    <thead class="bg-success">
        <tr>
            <th>IDN</th>
            <th>Cliente</th> 
            <th>Linea</th>
            <th>Producto</th>
            <th>OCC</th>
            <th>Lugar de entrega</th>
            <th>Fecha entrega solicitada</th>
            <th>Fecha entrega producción</th>
            <th>Planta</th>
            <th>Estatus</th>
            <!--<th>IDE</th>-->
        </tr>
    </thead> 
    <tbody>
        <tr>
            @foreach($traficos as $trafico)
            <td>
                <div class="d-inline-block custom-control custom-checkbox mr-1">
                    <input type="checkbox" {{($trafico->existe ==1)?'checked':''}} onchange="agrega_trafico({{$trafico->id_detalle}},{{ $trafico->idcliente}})"  class="custom-control-input" name="trafic_{{$trafico->id_detalle}}" id="trafic_{{$trafico->id_detalle}}" >
                    <label class="custom-control-label" for="trafic_{{$trafico->id_detalle}}">TR00{{$trafico->id_detalle}}</label>
                </div>
            </td>
            <td>{{ $trafico->nombre_corto}}</td>
            <td>{{ $trafico->incremento}}</td>
            <td>{{ $trafico->numero_parte}}</td>
            <td>{{ $trafico->orden_compra}}</td>
            <td>{{ ($trafico->shipping > 0) ?  $trafico->calle . ', '. $trafico->nmunicipio .', '. $trafico->nestado . ', ' . $trafico->npais : ''}}</td>
            <td>{{ $trafico->fecha_entrega}}</td>  
            <td>{{ $trafico->fecha_estimado_termino}}</td> 
            <td>{{ $trafico->planta_name}}</td> 
            <td></td>
            <!--<td><a data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#primary" onclick="seguimiento_trafico({{$trafico->id}})">{{ $trafico->id}}</a></td>--->
        </tr>
        @endforeach
    </tbody>
</table>
@section('script')
  <script type="text/javascript">
    var table = $('#trafico_seg').DataTable({
      "scrollX": true,
      "paging": false
    });
  </script>
  @endsection