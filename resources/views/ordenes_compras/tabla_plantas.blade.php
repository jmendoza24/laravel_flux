@if(sizeof($detalle)>0)
<a href="{{ route('envia_plantas',['id_planta'=>$detalle[0]->planta])}}"><button class="btn btn-primary pull-right">Enviar</button></a> 
<br><br>
@endif
<table class="table display nowrap table-striped table-bordered zero-configuration small">
	<thead>
		<tr style="background: #518a87; color: white;">
			<td>IDN</td>
			<td>Planta</td>
			<td>Unidades</td>
			<td>U. Medida</td>
			<td>Libras</td>
			<td>Descripción</td>
			<td>Precio unidad</td>
			<td>Total dls</td>
		</tr>
	</thead>
	@foreach($detalle as $det)
	<tr>
		<td>{{ str_pad($det->id,8,'0',STR_PAD_LEFT) }}</td>
		<td>{{ $det->nombre}}</td>
		<td></td>
		<td></td>
		<td></td>
		<td>{{ $det->descripcion}}</td>
		<td style="text-align: right;">${{ number_format($det->costo_produccion,2)}}</td>
		<td></td>
	</tr>
	@endforeach
</table>