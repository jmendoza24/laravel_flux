@php($i = 1)
@php($conteos = 0)
@php($weight = 0)

<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;" border="0">
	<tr>
		<td rowspan="2"><img src="{{ asset('app-assets/images/logo/flux.png') }}" style="width: 100px;"/></td>
		<td style="text-align: right;">Packing List</td>
	</tr>
	<tr>
		<td>
			<label>FNE: {{ $trafico[0]->id}} </label><br>
			<label>Date: {{ date('m-d-Y')}}</label> <br>
			<label>Proforma Invoice: {{ $trafico[0]->id}}</label>
		</td>
	</tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;" border="1">
	<tr>
		<td><b>Seller/Shipper</b></td>
		<td><b>Buyer</b></td>
	</tr>
	<tr>
		<td>
			{{ $planta->nombre}}<br>
			{{ $planta->direccion}}, {{ $planta->colonia}}, <br/>
			{{ $planta->municipio}},  {{ $planta->nestado}},  <br/>
			{{ $planta->cp}}
		</td>
		<td>FLUXMETALS LLC <br> 
			650 N. SAM HOUSTON PARKWAY E.SUITE 112<br>
			HOUSTON, TX, 77060     TX ID:47-178021200</td>
	</tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;" border="1">
	<tr>
		<td><b>Ship to:</b></td>
		<td>		
			{{ $logistica->calle}} {{ $logistica->numero}}, {{ $logistica->municipio}}, <br> 
			{{ $logistica->nestado}}, {{ $logistica->npais}}, <br>
			{{ $logistica->cp}}
		</td>
	</tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse; font-size: 11px; font-family: sans-serif;" border="1">
	<tr style="text-align: center; background: #EEECEB;">
		<td rowspan="2">Bundle/unit</td>
		<td rowspan="2">Parts per crate</td>
		<td rowspan="2">Description / Parts number</td>
		<td rowspan="2">Customer PO</td>
		<td rowspan="2">PO Item</td>
		<td rowspan="2">Weight/Pounds</td>
		<td colspan="3">Dimensions</td>
	</tr>
	<tr  style="text-align: center; background: #EEECEB;">
		<td>Weight</td>
		<td>Width</td>
		<td>Height</td>
	</tr>
	@foreach($tarimas as $tar)
	<tr>
		<td style="text-align: center;">{{ $i}}</td>
		<td style="text-align: center;">
			@foreach($idns_conteo as $conteo)
				@if($tar->id== $conteo->id_tarima)
					{{$conteo->conteo}}
					@php($conteos += $conteo->conteo)
				@endif
			@endforeach
		</td>
		<td>
			<ul>
				@foreach($tarimas_idns as $idn)
					@if($idn->id_tarima==$tar->id)
						<li>	{{ $idn->idn }}</li>
					@endif
				@endforeach
			</ul>
		</td>
		<td>
			<ul>
				@foreach($tarimas_idns as $idn)
					@if($idn->id_tarima==$tar->id)
						<li>	{{ $idn->orden_compra }}</li>
					@endif
				@endforeach
			</ul>
		</td>
		<td>
			<ul>
				@foreach($tarimas_idns as $idn)
					@if($idn->id_tarima==$tar->id && $idn->incremento != '')
						<li>	{{ $idn->incremento }}</li>
					@endif
				@endforeach
			</ul>
		</td>
		<td style="text-align: right;">{{ number_format($tar->pero_tarima,2) }}</td>
		<td style="text-align: right;">{{ number_format($tar->peso,2) }}</td>
		<td style="text-align: right;">{{ number_format($tar->largo,2) }}</td>
		<td style="text-align: right;">{{ number_format($tar->altura,2) }}</td>
	</tr>
	@php($i += 1)
	@php($weight +=$tar->pero_tarima )
	@endforeach
</table>
<br>
<table style="font-family:sans-serif;">
	<tr>
		<td>Total Units:</td>
		<td>{{ $conteos}}</td>
	</tr>
	<tr>
		<td>Total Weight</td>
		<td>{{ $weight}}</td>
	</tr>
</table>