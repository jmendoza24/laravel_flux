<ul class="nav nav-tabs nav-underline no-hover-bg">
  <li class="nav-item">
    <a class="nav-link active" id="base-tab31" data-toggle="tab" aria-controls="tab31"
    href="#tab31" aria-expanded="true">Producción</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="base-tab32" data-toggle="tab" aria-controls="tab32" href="#tab32"
    aria-expanded="false">Calidad</a>
  </li>
</ul>
<div class="tab-content px-1 pt-1">
  <div role="tabpanel" class="tab-pane active" id="tab31" aria-expanded="true" aria-labelledby="base-tab31">
    @if(count($subprocesos)>0)
	<table class="table table-bordered">
			<tr>
				<td>Proceso</td>
				<td>Horas prog:</td>
				<td>Horas laboradas:</td>
				<td>Avance</td>
			</tr>
	</table>
	<div class="col-md-12">
	<table class="table table-bordered table-striped small" id="tabla_procesos_seg">
		<thead>
			<tr style="text-align: center;">
				<th>Subproceso</th>
				<th>Fecha inicio</th>
				<th>Total horas</th>
				<th>Hora 1</th>
				<th>Hora 2</th>
				<th>Hora 3</th>
				<th>Hora 4</th>
				<th>Hora 5</th>
				<th>Hora 6</th>
				<th>Hora 7</th>
				<th>Hora 8</th>
				<th>Hora 9</th>
				<th>Hora 10</th>
				<th>Fecha término</th>
			</tr>
		</thead>
		<tbody>
			@foreach($subprocesos as $subproces)
			<tr>
				<td>{{ $subproces->subproceso}}</td>
				<td>
					<input type="date" name="" class="form-control">
				</td>
				<td >111</td>
				<td><input type="number" name="" class="form-control"></td>
				<td><input type="number" name="" class="form-control"></td>
				<td><input type="number" name="" class="form-control"></td>
				<td><input type="number" name="" class="form-control"></td>
				<td><input type="number" name="" class="form-control"></td>
				<td><input type="number" name="" class="form-control"></td>
				<td><input type="number" name="" class="form-control"></td>
				<td><input type="number" name="" class="form-control"></td>
				<td><input type="number" name="" class="form-control"></td>
				<td><input type="number" name="" class="form-control"></td>
				<td><input type="date" name="" class="form-control"></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
	@else
	<h5>Agregue al menos un subproceso para la captura de horas</h5>
	@endif
  </div>
  <div class="tab-pane" id="tab32" aria-labelledby="base-tab32">
    <div class="row" style="overflow-y: scroll; max-height: 400px;">
    @include('ordenes_compras.informe_seguimiento')
    </div>
  </div>
</div>
