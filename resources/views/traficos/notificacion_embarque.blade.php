
<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;" border="0">
	<tr>
		<td rowspan="3"><img src="{{ asset('app-assets/images/logo/flux.png') }}" style="width: 100px;"/></td>
		<td colspan="4" style="text-align: center;"><b>NOTIFICACIÓN DE EMBARQUE</b></td>
	</tr>
	<tr>
		<td>Fecha:</td>
		<td>{{ date('m-d-Y')}}</td>
		<td>Factura:</td>
		<td>00001</td>
	</tr>
	<tr>
		<td>Referencia:</td>
		<td colspan="3"></td>
	</tr>
</table>
<br>
<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;" border="1">
	<tr>
		<td>Dirección de recolección:</td>
		<td  colspan="3">
			<b>{{$trafico->nombre}}</b> <br>
			{{ $trafico->direccion}}, {{ $trafico->colonia}}, {{ $trafico->municipio}}, {{ $trafico->estado}}, {{ $trafico->npais}} <br>
			cp: {{$trafico->cp}}
		</td>
	</tr>
	<tr>
		<td>Fecha de recolección:</td>
		<td>
			
		</td>
		<td>Horario recolección:</td>
		<td>12.00</td>
	</tr>
	<tr>
		<td>Dirección de entrega:</td>
		<td  colspan="3">
			
		</td>
	</tr>
	<tr>
		<td>Fecha de entrega:</td>
		<td>
			{{ $info->fecha_entrega}}
		</td>
		<td>Horario entrega:</td>
		<td></td>
	</tr>
	<tr>
		<td>Fecha de inspección:</td>
		<td>
			
		</td>
		<td>Horario inspección:</td>
		<td></td>
	</tr>
	<tr>
		<td>Contenedor:</td>
		<td  colspan="3">
			
		</td>
	</tr>
	<tr>
		<td>Dimensiones de plataforma:</td>
		<td>
		</td>
		<td>Otro:</td>
		<td></td>
	</tr>
	<tr>
		<td>Comodity:</td>
		<td colspan="3">
		</td>
	</tr>
	<tr>
		<td>Numero de bultos:</td>
		<td colspan="3">
		</td>
	</tr>
	<tr>
		<td>Peso total:</td>
		<td colspan="3">
		</td>
	</tr>
	<tr>
		<td>
			Tipo Embalaje:
		</td>
		<td colspan="3">
			
		</td>
	</tr>
	<tr>
		<td>
			Observaciones / Instrucciones especiales:
		</td>
		<td colspan="3">
			
		</td>
	</tr>
</table>
<br>

<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;" border="1">
	<tr>
		<td colspan="4">Datos del transporte</td>
	</tr>
	<tr>
		<td>Nombre de la linea</td>
		<td></td>
		<td># Economico</td>
		<td></td>
	</tr>
	<tr>
		<td>Placas</td>
		<td>{{ $info->placas}}</td>
		<td>Tipo contenedor</td>
		<td></td>
	</tr>
</table>