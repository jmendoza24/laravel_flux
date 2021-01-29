<table class="table table-bordered table-colapsed " id="trafico_nuevo">
	<thead class="bg-success">
		<tr>
			<th>FNE</th>
			<th>CNE</th>
			<th>Fecha entrega</th>
			<th>Lugar entrega</th>
			<th>Est. Producción</th>
			<th>Est. Embarque</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($trafico as $detalle)
		<tr>
			<td>{{ $detalle->ide}}</td>
			<td>{{ $detalle->nombre_corto}}</td>
			<td></td>
			<td>{{ ($detalle->shipping > 0) ?  $detalle->calle . ', '. $detalle->nmunicipio .', '. $detalle->nestado . ', ' . $detalle->npais : ''}}</td>
			<td></td>
			<td></td>
			<td>
				<div class="btn-group">
					<button class="btn btn-float btn-outline-secondary btn-round small" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#primary" onclick="seguimiento_trafico({{$detalle->ide}})"><i class="fa fa-file"></i></button>
					<button class="btn btn-float btn-outline-danger btn-round small" onclick="eliminar_trafico({{$detalle->ide}})"><i class="fa fa-trash"></i></button>
				</div>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@section('script')
  <script type="text/javascript">
    var table = $('#trafico_nuevo').DataTable({
      "scrollX": true,
      "paging": false,
      "ordering": true,
      "order": [[ 0, "desc" ]]
    });
  </script>
  @endsection