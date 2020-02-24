<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;" border="1">
	<tr>
		<td rowspan="3">Logo</td>
		<td colspan="4" style="text-align: center;"><b>COMPLEMENTO DE COMERCIO EXTERIOR</b></td>
	</tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;" border="1">
	<tr>
		<td>Tipo de operación:</td>
		<td></td>
	</tr>
	<tr>
		<td>Clave del procedimento</td>
		<td></td>
	</tr>
	<tr>
		<td>Certificado de origen</td>
		<td></td>
	</tr>
	<tr>
		<td>Número de certificado de origen</td>
		<td></td>
	</tr>
	<tr>
		<td>Número exportador confiable</td>
		<td></td>
	</tr>
	<tr>
		<td>IncoTerm</td>
		<td></td>
	</tr>
	<tr>
		<td>Subdivición</td>
		<td></td>
	</tr>
	<tr>
		<td>Observaciones</td>
		<td></td>
	</tr>
	<tr>
		<td>Tipo de cambio USD</td>
		<td></td>
	</tr>
	<tr>
		<td>Total dolares</td>
		<td></td>
	</tr>
	<tr>
		<td>NODO RECEPTOR</td>
		<td></td>
	</tr>
	<tr>
		<td>Número de registro de identidad tributaria</td>
		<td></td>
	</tr>
	<tr>
		<td>NODO MERCANCIAS</td>
		<td></td>
	</tr>

</table>
<br>

<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;" border="1">
@foreach($trafico as $trafic)

	<tr>
		<td>No. Identificación</td>
		<td>{{ $trafic->numero_parte}}</td>
	</tr>
	<tr>
		<td>Fracción arancelaria</td>
		<td></td>
	</tr>
	<tr>
		<td>Cantidad Aduana(Kgs)</td>
		<td></td>
	</tr>
	<tr>
		<td>Descripciones especificas</td>
		<td>1 Pieza</td>
	</tr>
	<tr>
		<td>No. de serie</td>
		<td>{{ $trafic->id_detalle}}</td>
	</tr>
	<tr>
		<td>
			Clave de cada producto o servicio de acuerdo al catalogo del SAT
		</td>
		<td></td>
	</tr>
	<tr>
		<td colspan="2" style="background-color: #e3e8e5;">&nbsp;</td>
	</tr>
@endforeach
</table>