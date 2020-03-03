@if(sizeof($informacion)>0)
<h5>{{ $informacion[0]->orden_compra}}</h5>
<table class="table table-bordered table-striped small">
	<tr class="bg-success">
		<td>Linea</td>
		<td>Producto</td>
		<td>IDN's</td>
		<td>IDE</td>
		<td>Fecha entrega</td>
		<td>Invoice</td>
		<td>Estatus</td>
	</tr>
	@foreach($informacion as $info)
		<tr>
			<td>{{ $info->incremento}}</td>
			<td>{{ $info->numero_parte}}</td>
			<td>{{ $info->id}}</td>
			<td>{{ $info->id_trafico}}</td>
			<td>{{ $info->fecha_entrega}}</td>
			<td>{{ $info->invoice}}</td>
			<td></td>
		</tr>
	@endforeach
</table>
@else
<h5>Sin información</h5>
@endif