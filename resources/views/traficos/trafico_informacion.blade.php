
<div style="max-height: 400px; overflow-y: scroll;">
	<table class="table table-bordered table-striped small">
		<tr>
			<td>IDN</td>
			<td>Producto</td>
			<td>Est. Producción</td> 
			<td>Est. Calidad</td>
			<td>Fecha comp. entrega</td>
		</tr>
		@foreach($traficos as $traff)
		<tr>
			<td>{{ $traff->id_detalle}}</td>
			<td>{{ $traff->numero_parte}}</td>
			<td>
				@foreach($status_prod as $status)
					@if($status->id_detalle==$traff->id_detalle && $status->conteo > 0)
					<span class="badge badge-primary">Completo</span>
					@elseif($status->id_detalle==$traff->id_detalle && $status->conteo == 0)
					<span class="badge badge-warning">NO completo</span>
					@endif
				@endforeach
			</td>
			<td>
				@foreach($estatus_calidad as $calidad)
					@if($calidad->id_detalle == $traff->id_detalle)
						@if($calidad->conteo == 7)
							<span class="badge badge-primary">Completo</span>
						@elseif($calidad->conteo < 7)
							<span class="badge badge-warning">NO completo</span>	
						@endif
					@endif
				@endforeach
			</td>
			<td>{{ $traff->fecha_entrega}}</td>
		</tr>
		@endforeach
	</table>
</div>