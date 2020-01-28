@if(sizeof($detalle)>0)
<a href="{{ route('envia_plantas',['id_planta'=>$detalle[0]->planta])}}"><button class="btn btn-primary pull-right">Enviar</button></a> 
<br><br>
@endif
<table class="table display nowrap table-striped table-bordered zero-configuration small">
	<thead>
		<tr style="background: #518a87; color: white;">
			<td>PLANTA</td>
			<td>UNIDADES / QUANTITY</td>
			<td>U. MEDIDA / UOM</td>
			<td>LIBRAS / LBS</td>
			<td>DESCRIPCION / FULL DESCRIPTION</td>
			<td>PRECIO UNIDAD  / UNIT PRICE	</td>
			<td>TOTAL DLLS / TOTAL DOLLAR VALUE</td>
		</tr>
	</thead>
	@foreach($detalle as $det)
	<tr>
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