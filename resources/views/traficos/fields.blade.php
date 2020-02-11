<table class="table table-bordered table-colapsed">
	<thead>
		<tr>
			<th>IDE</th>
			<th>Cliente</th>
			<th>Fecha entrega</th>
			<th>Lugar entrega</th>
			<th>Estatus prod.</th>
			<th>Estatus logist</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($trafico_detalle as $detalle)
		<tr>
			<td>{{ $detalle->ide}}</td>
			<td>{{ $detalle->nombre_corto}}</td>
			<td>{{ $detalle->fecha_entrega}}</td>
			<td>{{ ($detalle->shipping > 0) ?  $detalle->calle . ', '. $detalle->nmunicipio .', '. $detalle->nestado . ', ' . $detalle->npais : ''}}</td>
			<td></td>
			<td></td>
			<td>
				<div class="btn-group">
					<button class="btn btn-info small"><i class="fa fa-edit"></i></button>
					<button class="btn btn-info small"><i class="fa fa-trash"></i></button>
				</div>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>