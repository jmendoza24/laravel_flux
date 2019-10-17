<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<table class="table table-bordered">
	<tr>
		<td style="border-right: 1px solid white; "><img src="{{ url('app-assets/images/logo/flux.png') }}" style="width: 140px;"/></td>
		<td style="border-right: 1px solid white; "><h4>Quotation</h4></td>
		<td><h6>Quotation ID: <b>00{{ $cotizacion->id }}</b></h6>
			<h6>Date: <b>{{  date("m-d-Y", strtotime($cotizacion->fecha)) }}</h6>
			<h6>Created by: </h6></td>
	</tr>
	<tr>
		<td>Client:{{ $cotizacion->nombre_corto }} <br/>
					{{ $cotizacion->direccion }}</td>
		<td>Freight terms: </td>
		<td>Payment Terms:</td>
	</tr>
	<tr>
		<td colspan="3">
			<table class="table" style="font-size: 11px;">
			    <thead class="" style="background: #518a87; border: 1px solid #518a87; color: white;">
			      <tr>
			        <th>Item</th>
			        <th>Part Description</th>
			        <th>Drawing No</th>
			        <th>Lead time:</th> 
			        <th>Quantity</th>
			        <th>Unit Price</th>
			      </tr>
			    </thead>
			    <tbody>
			      @foreach($detalle as $det)
			      <tr>
			        <td>{{ $det->numero_parte }}</td>
			        <td>{{ $det->descripcion}}</td>
			        <td>{{ $det->dibujo_nombre}}</td>
			        <td style="text-align: center;">{{ $det->tiempo_entrega }}</td>
			        <td>{{ $det->cantidad}}</td>
			        <td style="text-align: right;">${{ number_format($det->costo_material,2)}}</td>
			      </tr>
			      @endforeach
			    </tbody>
			  </table>
		</td>
	</tr>
	<tr>
		<td colspan="3"><h6>Special Note:</h6>
			{{ $cotizacion->id_notas }}
		</td>
	</tr>
</table>