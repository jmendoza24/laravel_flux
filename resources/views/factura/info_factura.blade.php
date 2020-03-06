<table class="table table-bordered table-striped small">
	<tr class="bg-success">
		<td>Invoice</td>
		<td>Ide</td>
		<td>Fecha entrega</td>
		<td>Fecha pago</td>
		<td>Monto</td>
		<td>Monto pago</td>
		<td>Descuento</td>
	</tr>
	@foreach($informacion as $info)
	<tr>
		<td>{{ $info->id}}</td>
		<td>{{ $info->id_trafico}}</td>
		<td>{{ $info->fecha_entrega}}</td>
		<td>{{ $info->fecha_pago}}</td>
		<td style="text-align: right;">${{ number_format($info->monto,2)}}</td>
		<td><input type="number" min="0" style="width: 140px;" class="form-control" onchange="actualiza_monto('{{ $info->orden_compra}}',{{$info->id}})" step="any" id="monto_pagado_{{$info->id}}" value="{{ $info->monto_pagado }}"></td>
		<td style="text-align: right;">${{ number_format($info->monto -  $info->monto_pagado,2)}}</td>
	</tr>
	@endforeach
</table>

