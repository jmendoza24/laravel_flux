<table style="width: 100%;">
	<tr>
		<td>Flux Metals</td>
		<td>Factura <br>COMMERCIAL INVOICE</td>
	</tr>
	<tr style="background: #518a87; color: white;">
		<td >
			NOMBRE DE LA EMPRESA / COMPANY NAME: 
		</td>
		<td>
			FACTURA NUMERO: <br>
			COMMERCIAL INVOICE NUMBER
		</td>
	</tr>
	<tr>
		<td>
			FLUXMETALS DE MEXICO S. DE R.L. DE C.V.<br>
			CALLE PANAMA No. 23C INTERIOR A<br>
			COL. MODELO  C.P: 87360<br>		
			H. MATAMOROS, TAMPS.<br>		
			R.F.C.: FME1409297L7		
		</td>
		<td>
			FECHA /DATE (dd/mm/yyyy): {{ date('d/m/Y')}}<br>
			O.C. CLIENTE/P.O. number: <br>
			GSL: 
		</td>
	</tr>
	<tr>
		<td>
			<div style="width: 100%;background: #518a87; color: white; ">
			NOMBRE Y DOMICILIO DEL DESTINATARIO / CUSTOMER NAME AND ADDRESS:
		</div><br>
		FLUXMETALS LLC <br>
		10 MARIN CREEK PL <br>
		THE WOODLANDS, TX 77389  TX ID:47-178021200
		</td>
		<td>
			LUGAR DE DESTINO: Claremore, OK. <br>
			DESTINATION<br>		
			TRANSPORTE/CARRIER:<br> 		
			SCAC:<br>  		
			# PLACAS:  		CAAT: <br>
			PLATE NUMBER	
		</td>
	</tr>
</table>
<table style="width: 100%;" border="0">
	<tr>
		<td>
			REGIMEN:    EXPORT <br>
			PEDIMENTO:
		</td>
		<td>
			PAIS VENDEDOR:         MX <br>
			SELLER'S COUNTRY <br>
			ENT. FEDERATIVA:       TM <br>
			T.C:
		</td>
		<td>
			POR CUENTA DE:<br>
			ON BEHALF OF: <br>
			FLUXMETALS DE MEXICO S. DE R.L. DE C.V.<br>
			Factura (s) /Invoice (s) :  0
		</td>
	</tr>
	<tr>
		<td colspan="3" style="background: #518a87; color: white; ">IMPORTADOR REGISTRADO DE MERCANCIA / IMPORTER OF RECORD:</td>
	</tr>
	<tr>
		<td colspan="2">
			GE Oil & Gas ESP, Inc.<br>
			5500 SE 59Th St, Oklahoma City, OK 73135-4530 <br>
			Tax Exempt No. 451919
		</td>
		<td>
			TAX ID: NA
		</td>
	</tr>
	<tr>
		<td>CANTIDAD / QUANTITY</td>
		<td>NUM. DE BULTOS / NUMBER OF BUNDLES:</td>
		<td>VALOR / VALUE</td>
	</tr>
</table>
<table style="width: 100%; border-collapse: collapse;" border="1">
	<tr style="background: #518a87; color: white;">
		<td>UNIDADES / QUANTITY</td>
		<td>U. MEDIDA / UOM</td>
		<td>LIBRAS / LBS</td>
		<td>DESCRIPCION / FULL DESCRIPTION</td>
		<td>PRECIO UNIDAD  / UNIT PRICE	</td>
		<td>TOTAL DLLS / TOTAL DOLLAR VALUE</td>
	</tr>
	@foreach($detalle as $det)
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>{{ $det->descripcion}}</td>
		<td style="text-align: right;">${{ number_format($det->costo_produccion,2)}}</td>
		<td></td>
	</tr>
	@endforeach
	<tr>
		<td></td>
		<td></td>
		<td>0.00</td>
		<td></td>
		<td></td>
		<td>$0.00</td>
	</tr>
</table>
<table style="width: 100%;">
	<tr>
		<td colspan="3">Terminos y Condiciones / Terms: FCA Matamoros.</td>
	</tr>
	<tr>
		<td>Importador Registrado de Mercancía / </td>
		<td>GE Oil & Gas ESP, Inc.</td>
		<td>Tax Id: NA</td>
	</tr>
	<tr>
		<td> Importer of Record: </td>
		<td>5500 SE 59Th St, Oklahoma City, OK 73135-4530 <br>Tax Exempt No. 451919
		</td>
		<td></td>
	</tr>
	<tr>
		<td colspan="3">
			TERMINOS Y CONDICIONES BASADO EN EL CONTRATO DE SERVICIOS DE MAQUILA CON FECHA 19 DE DICIEMBRE DE 2014<br>
			Los precios incluyen 6.5% establecido en el Contrato de Servicios de Maquila.<br>	
			Precios en Dolares de los Estados Unidos de America.<br>	
			No incluye gastos de Logistica y Exportacion.<br>	
			<br>	
			BAJO PROTESTA DE DECIR VERDAD QUE LOS DATOS Y VALORES ASENTADOS EN LA PRESENTE FACTURA	<br>
			SON REALES CORRECTOS Y VERDADEROS.	
		</td>
	</tr>
</table>