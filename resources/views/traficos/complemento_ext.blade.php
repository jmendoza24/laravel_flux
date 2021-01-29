<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;" border="0">
	<tr>
		<td rowspan="3"><img src="{{ asset('app-assets/images/logo/flux.png') }}" style="width: 100px;"/></td>
		<td colspan="4" style="text-align: center;"><b>COMPLEMENTO DE COMERCIO EXTERIOR</b></td>
	</tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;" border="1">
	<tr>
		<td style="background-color: #F5DA81">Tipo de operación:</td>
		<td style="text-align: center;">EXPORTACIÓN FM004-PG20,0420-004</td>
	</tr>
	<tr>
		<td style="background-color: #F5DA81">Clave del procedimento</td>
		<td style="text-align: center;">Importación o exportación definitiva</td>
	</tr>
	<tr>
		<td style="background-color: #F5DA81">Certificado de origen</td>
		<td style="text-align: center;">No funge como certificaco de origen</td>
	</tr>
	<tr>
		<td style="background-color: #F5DA81">IncoTerm</td>
		<td style="text-align: center;">FCA</td>
	</tr>
	<tr>
		<td style="background-color: #F5DA81">Subdivición</td>
		<td style="text-align: center;">No tiene subdivisión</td>
	</tr>
	<tr>
		<td style="background-color: #F5DA81">Tipo de cambio USD</td>
		<td style="text-align: center;">$24.0925</td>
	</tr>
	<tr>
		<td style="background-color: #F5DA81">Total dolares</td>
		<td style="text-align: center;">$50,161.00</td>
	</tr>
	<tr style="background-color: #F5DA81;text-align: center;">
		<td colspan="2">NODO RECEPTOR</td>
		
	</tr>
	<tr>
		<td style="background-color: #F5DA81">Número de registro de identidad tributaria</td>
		<td style="text-align: center;">47-178021200</td>
	</tr>
	<tr style="background-color: #F5DA81;text-align: center;">
		<td colspan="2">NODO MERCANCIAS</td>
	</tr>

</table>
<br>

<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;" border="1">
@foreach($trafico as $trafic)

	<tr>
		<td style="background-color: #F5DA81">No. Identificación</td>
		<td>{{ $trafic->numero_parte}}</td>
		<td>{{ $trafic->numero_parte}}</td>
		<td>{{ $trafic->numero_parte}}</td>
		<td>{{ $trafic->numero_parte}}</td>
		<td>{{ $trafic->numero_parte}}</td>

	</tr>
	<tr>
		<td style="background-color: #F5DA81">Fracción MX</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td style="background-color: #F5DA81">Cantidad Aduana(Kgs)</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td style="background-color: #F5DA81">Descripciones especificas</td>
		<td>1 Pieza</td>
		<td>1 Pieza</td>
		<td>1 Pieza</td>
		<td>1 Pieza</td>
		<td>1 Pieza</td>

	</tr>
	<tr>
		<td style="background-color: #F5DA81">No. de serie</td>
		<td>{{ $trafic->id_detalle}}</td>
		<td>{{ $trafic->id_detalle}}</td>
		<td>{{ $trafic->id_detalle}}</td>
		<td>{{ $trafic->id_detalle}}</td>
		<td>{{ $trafic->id_detalle}}</td>
	</tr>

@endforeach
</table>