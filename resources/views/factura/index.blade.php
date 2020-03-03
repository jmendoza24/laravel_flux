@extends('layouts.app')
@section('titulo')Facturas @endsection
@section('content')
<ul class="nav nav-tabs nav-underline no-hover-bg">
  <li class="nav-item">
    <a class="nav-link active" id="base-tab31" data-toggle="tab" aria-controls="tab31"
    href="#tab31" aria-expanded="true">Por OCC</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="base-tab32" data-toggle="tab" aria-controls="tab32" href="#tab32"
    aria-expanded="false">Invoices</a>
  </li>
</ul>
<div class="tab-content px-1 pt-1">
  <div role="tabpanel" class="tab-pane active" id="tab31" aria-expanded="true" aria-labelledby="base-tab31">
     @include('factura.table')
  </div>
  <div class="tab-pane" id="tab32" aria-labelledby="base-tab32">
  	<div class="col-md-12" style="overflow-x: scroll;">
	  	<table class="table table-bordered table-striped">
	  		<thead class="bg-success">
	  			<tr>
	  				<th>Invoice</th>
	  				<th>Fecha</th>
	  				<th>Cliente</th>
	  				<th>OCC</th>
	  				<th>IDE</th>
	  				<th>Fecha Entrega</th>
	  				<th>Monto</th>
	  				<th>Pago</th>
	  				<th>Fecha Pago</th>
	  				<th>Descuento</th>
	  				<th>Estatus</th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  			@foreach($invoices as $inv)
	  			<tr>
	  				<td>{{ $inv->id}}</td>
	  				<td>{{ $inv->created_at}}</td>
	  				<td>{{ $inv->nombre_corto}}</td>
	  				<td>{{ $inv->orden_compra}}</td>
	  				<td>{{ $inv->id_trafico}}</td>
	  				<td>{{ $inv->fecha_entrega}}</td>
	  				<td>${{ number_format($inv->monto,2)}}</td>
	  				<td>${{ number_format($inv->monto_pagado,2)}}</td>
	  				<td>{{ $inv->fecha_pago}}</td>
	  				<td>${{ number_format($inv->monto -  $inv->monto_pagado,2)}}</td>
	  				<td></td>
	  			</tr>
	  			@endforeach
	  		</tbody>
	  	</table>
  	</div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
    $('#factura-table').DataTable( {
        "paging":   false,
        "ordering": true,
        "info":     true
    } );
} );

</script>
@endsection
