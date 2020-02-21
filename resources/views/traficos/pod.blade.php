<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;" border="1">
	<tr>
		<td>Logo</td>
		<td style="text-align: right; "><b>POD-Shipment # FM001-PG-20 <br>
			CUSTUMER RECEIVING
			</b><br/>
			PROOF OF DELIVERY <br>
			DATE: {{ date('m-d-Y')}}<br>
			<label style="font-size: 14px;"> POD - {{$pod->calle . ', ' .$pod->municipio .', '. $pod->nestado .', '. $pod->npais}}</label>
		</td>
	</tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse; font-family: sans-serif; " border="1">
	<tr style="text-align: center;">
		<td>ITEM</td>
		<td>PART NUMBER</td>
		<td>DESCRIPTION</td>
		<td>PO</td>
		<td>LINE</td>
		<td>QUANTITY</td>
	</tr>
	@php($i = 1)
	@foreach($items as $item)
		<tr>
			<td style="text-align: center;">{{ $i }}</td>
			<td>{{ $item->numero_parte}}</td>
			<td>{{ $item->descripcion}}</td>
			<td>{{ $item->orden_compra}}</td>
			<td>{{ $item->incremento}}</td>
			<td style="text-align: center;">{{ $item->conteo}}</td>
		</tr>
		@php($i += 1)
	@endforeach
</table>

<br>
<b>Note:</b>


<br><br>

