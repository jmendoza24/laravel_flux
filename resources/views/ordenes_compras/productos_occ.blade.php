<table class="table table-bordered table-striped small">
	<thead>
		<tr>
			<th>Número parte</th>
			<th>IDN</th>
			<th>Fecha entrega</th>
		</tr>
	</thead>
	<tbody>
		@foreach($productos as $producto)
		<tr>
			<td>{{$producto->numero_parte}}</td>
			<td>1</td>
			<td>{{ $producto->fecha_entrega}}</td>
		</tr>
		@endforeach
	</tbody>
</table>