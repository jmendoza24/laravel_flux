@if(count($subprocesos)>0)
<table class="table table-bordered">
		<tr>
			<td>Proceso</td>
			<td>Horas prog:</td>
			<td>Horas laboradas:</td>
			<td>Avance</td>
		</tr>
</table>
<table class="table table-bordered table-striped compact">
	<thead>
		<tr>
			<th>Subproceso</th>
			<th>Fecha inicio</th>
			<th>Total horas</th>
			<th colspan="5" style="text-align: center;">Horas</th>
		</tr>
	</thead>
	<tbody>
		@foreach($subprocesos as $subproces)
		<tr>
			<td>{{ $subproces->subproceso}}</td>
			<td>
				<input type="date" name="" class="form-control">
			</td>
			<td >Total horas</td>
			<th><input type="number" name="" class="form-control"></th>
			<th><input type="number" name="" class="form-control"></th>
			<th><input type="number" name="" class="form-control"></th>
			<th><input type="number" name="" class="form-control"></th>
			<th><input type="number" name="" class="form-control"></th>
		</tr>
		@endforeach
	</tbody>
</table>
@else
<h5>Agregue al menos un subproceso para la captura de horas</h5>
@endif