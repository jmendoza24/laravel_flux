<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;font-size: 13px" border="0">
	<tr>
		<td><img src="{{ asset('app-assets/images/logo/flux.png') }}" style="width: 100px;"/></td>
		<td style="text-align: center; "><b>FACTURA</b> <br>
			COMERCIAL INVOICE
		</td>
	</tr>
</table>

<table style="width: 100%; border-collapse: collapse; font-family: sans-serif; font-size: 13px" border="1">
    
    
    
    <tr  style="background-color: #0A2A22;color: #FFFFFF">
        <td colspan="2" align="left">NOMBRE DE LA EMPRESA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td align="left">FACTURA NUMERO 0820-009</td>
    </tr>
    <tr>
        <td rowspan="1" colspan="2" valign="middle" align="left">
            
            			FLUXMETALS DE MEXICO S. DE R.L DE C.V<br>
            			PANAMA No. 23 No. Int A<br>
            			COL. MODELO C.P 87360<br>
            			MATAMOROS. TAMAULIPAS MEXICO<br>
            			R.F.C: FME1409297L7</p>
            			
        </td>
        

		<td rowspan="1" valign="middle"> 
		
            			<p>FECHA {{ date('m-d-Y')}}<br>
            			<p>O.C CLIENTE # 4511126238<br>
            			GSL K88373</p

		</td>
    </tr>
    <tr>
        
        
    <td colspan="2" valign="middle" style="background-color: #0A2A22;color: #FFFFFF" align="left"><b>NOMBRE Y DOMICILIO DEL DESTINATARIO</b></td>
    <td style="border=0;border-bottom-color:#FFFFFF; ">LUGAR DE DESTINO: LUFKIN TEXAS USA</td>
    
    </tr>
    <tr>
    
    
    <td rowspan="1" colspan="2" valign="middle" align="left">
    
    
            			<p>FLUXMETALSLLC<br>
            			10 MARIN CREEK PL:<br>
            			THE WOODLANDS. TX 77389  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  TX ID 34-4567</p>


    </td>
    
        
        		<td rowspan="1">
        		    
            			<p>TRANSPORTE/CARRIER:<br>
            			SCAC:<br>
            			# PLACAS:  123456     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CAAT:</p>
            	</td>
    </tr>
        	
    
    
        
</table>
<br>
<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;font-size: 13px " border="1">
	<tr>
		<td rowspan="3" valign="middle" align="left">
			<P>REGIMEN: EXPORT<br>
			PEDIMENTO:</P>
		</td>
		<td>PAIS: MX</td>
		<td>POR CUENTA DE</td>
	</tr>
	<tr>
		<td>ENT. FEDERATIVA: TM</td>
		<td>FLUXMETALS DE MEXICO S DE. R.L DE C.V</td>
	</tr>
	<tr>
		<td>T.C: 2332</td>
		<td>FACTURA: 123456 </td>
	</tr>

</table>

<br>
<table style="width: 100%; border-collapse: collapse; font-family: sans-serif; font-size: 13px" border="1">
	<tr>
		<td style="background-color: #0A2A22;color: #FFFFFF" align=""><b>IMPORTADOR DE REGISTRO DE MERCANCIA</b></td>
	</tr>
	<TR>
	       <td rowspan="1" colspan="" valign="middle" align="left">
	           
            			<p>GEL OIL ESP.INC &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  TAX ID: NA<br>
            			55 SE 59TH SL TEXAS CITY , OK<br>
            			TAX EXEMPT NO,343434  </p>

	       </td>

	</TR>
	
	
	
</table>
<br>
<table style="width: 100%; border-collapse: collapse; font-family: sans-serif;font-size: 13px " border="1">
    	<tr>
		<td colspan="2"><b>CANTIDAD</b></td>
		<td colspan="4"><b>NUM DE BULTOS</b></td>
	</tr>
	<tr style="background-color: #0A2A22;color: #FFFFFF">
		<td><b>UNIDADES</b></td>
		<td><b>U.MEDIDA</b></td>
		<td><b>LIBRAS</b></td>
		<td><b>DESCRIPTION</b></td>		
		<td><b>UNIT PRICE</b></td>
		<td><b>TOTAL DLLS</b></td>
	</tr>
	@php($i = 1)
	@php($subtotal = 1)
	@foreach($items as $item)
		<tr>
			<td style="text-align: center;">{{ $i }}</td>
			<td style="text-align: center;">{{ $item->numero_parte}}</td>
			<td style="text-align: center;">{{ $i }}</td>
			<td>{{ $item->descripcion}}</td>
			<td style="text-align: right;">$ {{ number_format($item->costo_produccion,2)  }}</td>
			<td style="text-align: right;">$ {{ number_format($item->costo_produccion ,2)  }}</td>
		</tr>
		@php($i += 1)
		@php($subtotal += $item->costo_produccion)
	@endforeach
	<tr>
		<td colspan="6">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="4" rowspan="3">
			Expeditors International -Laredo <br>
			8518 W, Bob Vuilock Loop <br>
			Laredo, TX 78045 <br>

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


