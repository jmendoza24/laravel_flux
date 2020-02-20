<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;" border="1">
	<tr>
		<td>Logo</td>
		<td style="text-align: center; "><b>FLUXMETALS</b> <br>
			direccion <br>
			fluxmetals.com
		</td>
		<td style="background: black; color: white; text-align: center;">
			<h2><b>INVOICE</b></h2>
		</td>
	</tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse; font-family: sans-serif; " border="1">
	<tr>
		<td rowspan="6">
			<b>Customer name and address:</b>
		</td>
		<td>Date</td>
		<td>{{ date('m-d-Y')}}</td>
	</tr>
	<tr>
		<td>Invoince #</td>
		<td>pa22222</td>
	</tr>
	<tr>
		<td>Customer ID</td>
		<td>988373</td>
	</tr>
	<tr>
		<td>
			Shipment number
		</td>
		<td>FX92993</td>
	</tr>
	<tr>
		<td>Delivery</td>
		<td>FCA Fluxmetals</td>
	</tr>
	<tr>
		<td>Supplier No.</td>
		<td>746464</td>
	</tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse; font-family: sans-serif; " border="1">
	<tr>
		<td>P.O/S.O. Number</td>
		<td>PATMENTS TERMS</td>
	</tr>
	<tr>
		<td>7474,4,4,4,4,4</td>
		<td>bla bla bla</td>
	</tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse; font-family: sans-serif; " border="1">
	<tr style="text-align: center;">
		<td></td>
		<td>DESCRIPTION</td>
		<td>PART NUMBER</td>
		<td>ITEM</td>		
		<td>QUANTITY</td>
		<td>UNIT PRICE</td>
		<td>AMOUNT</td>
	</tr>
	@php($i = 1)
	@php($subtotal = 1)
	@foreach($items as $item)
		<tr>
			<td style="text-align: center;">{{ $i }}</td>
			<td>{{ $item->descripcion}}</td>
			<td>{{ $item->numero_parte}}</td>
			<td>{{ $item->incremento}}</td>
			<td style="text-align: center;">1</td>
			<td style="text-align: right;">$ {{ number_format($item->costo_produccion,2)  }}</td>
			<td style="text-align: right;">$ {{ number_format($item->costo_produccion ,2)  }}</td>
		</tr>
		@php($i += 1)
		@php($subtotal += $item->costo_produccion)
	@endforeach
	<tr>
		<td colspan="7">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5" rowspan="3">
			<b>Notify to:</b> <br>
			Expeditors International -Laredo <br>
			8518 W, Bob Vuilock Loop <br>
			Laredo, TX 78045 <br>
			P:(98837374)<br>
			LDR-Automotive@expeditors.com

		</td>
		<td>Subtotal:</td>
		<td style="text-align: right;">${{ number_format($subtotal,2)}}</td>
	</tr>
	<tr>
		<td>Tax: (0%)</td>
		<td style="text-align: right;">$ {{number_format(0,2)}}</td>
	</tr>
	<tr>
		<td>Total:</td>
		<td style="text-align: right;">${{ number_format($subtotal,2)}}</td>
	</tr>
</table>


