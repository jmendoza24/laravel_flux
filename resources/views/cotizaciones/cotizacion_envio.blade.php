@if($envio==1)
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@endif
<table class="table table-bordered">
	<tr>
		<td style="border-right: 1px solid white; "><img src="{{ asset('app-assets/images/logo/flux.png') }}" style="width: 140px;"/></td>
		<td style="border-right: 1px solid white; "><h4>Quotation</h4></td>
		<td><h6>Quotation ID: <b>00{{ $cotizacion->id }}</b></h6>
			<h6>Date: <b>{{  date("m-d-Y", strtotime($cotizacion->fecha)) }}</h6>
			<h6>Created by: {{$cotizacion->name}} </h6></td>
	</tr>
	<tr>
		<td>Client:{{ $cotizacion->nombre_corto }} <br/>
					{{ $cotizacion->direccion }}</td>
		<td>Freight terms: </td>
		<td>Payment Terms:</td>
	</tr>
	<tr>
		<td colspan="3">
			<table class="table" style="">
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
	<tr>
		<td colspan="3"><h6>Inco term:</h6>
			{{ $cotizacion->id_notas }}
		</td>
	</tr>
</table>
@if($envio==0)
<hr>
<div class="form-group col-sm-12" style="text-align: right;">
    <a href="{!! route('cotizaciones.historia') !!}" class="btn btn-warning mr-1">Cancelar</a>
    <button class="btn btn-primary">Convertir a OCC</button>
</div>
@endif