<h4>Costo por planta: <span><b>{{$plantascosto[0]->numero_parte}}</b></span></h4> 
<hr>
@if(count($plantascosto)>0)
<table class="table table-striped table-bordered display">
	<thead>
		<tr>
			<td>Planta</td>
			<td>Costo</td>
		</tr>
	</thead>
	<tbody>
		@foreach($plantascosto as $costo)
			<tr>
				<td>{{ $costo->nombre}}</td>
				<td style="text-align: right;">${{ number_format($costo->costo,2)}}</td>
			</tr>
		@endforeach
	</tbody>
	
</table>
@else 
<h4>Sin datos</h4>
@endif