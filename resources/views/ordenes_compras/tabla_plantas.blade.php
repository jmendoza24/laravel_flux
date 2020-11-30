@if(sizeof($detalle)>0)
<button onclick="envia_plantas({{$detalle[0]->planta}})" class="btn btn-primary pull-right">Enviar</button>
<br><br>
@endif
<table class="table display nowrap table-striped table-bordered" id="tabla_plantas_n">
	<thead>
		<tr style="background: #518a87; color: white;">
			<td>IDN</td>
			<td>Planta</td>
			<td>Pieza</td>
			<td>Descripción</td>
			<td>Precio unidad</td>
		</tr>
	</thead>
	@foreach($detalle as $det)
	<tr>
		<td>FM{{ str_pad($det->id,6,'0',STR_PAD_LEFT) }}</td>
		<td>{{ $det->nombre}}</td>
		<td>1</td>
		<td>{{ $det->descripcion}}</td>
		<td style="text-align: right;">${{ number_format($det->costo_produccion,2)}}</td>
	</tr>
	@endforeach
</table>