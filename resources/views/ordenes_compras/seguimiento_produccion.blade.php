@if(count($subprocesos)>0)
@php($sub_total = 0)
@php($total = 0)
@foreach($subprocesos as $subproceso)
		@php($sub_total = $subproceso->hora1 + $subproceso->hora2 + $subproceso->hora3 + $subproceso->hora4 + $subproceso->hora5+ $subproceso->hora6 + $subproceso->hora7 + $subproceso->hora8 + $subproceso->hora9 + $subproceso->hora10)
		@php($total += $sub_total)
		@endforeach
<table class="table table-bordered">
		<tr>
			<td>Proceso</td>
			<td>{{ $subprocesos[0]->procesos }}</td>
			<td>Horas prog:</td>
			<td>{{ $subprocesos[0]->horas}}</td>
			<td>Horas laboradas:</td>
			<td>{{ $total}}</td>
			<td>Avance</td>
			<td>{{ number_format(($total * 100)/ $subprocesos[0]->horas,0) }} %</td>
		</tr>
</table>
<div class="col-md-12">
<table class="table table-bordered table-striped small" id="tabla_procesos_seg">
	<thead>
		<tr style="text-align: center;">
			<th>Subproceso</th>
			<th>Total horas</th>
			<th>Fecha inicio</th>
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
		
		@foreach($subprocesos as $subproceso)
		@php($sub_total = $subproceso->hora1 + $subproceso->hora2 + $subproceso->hora3 + $subproceso->hora4 + $subproceso->hora5+ $subproceso->hora6 + $subproceso->hora7 + $subproceso->hora8 + $subproceso->hora9 + $subproceso->hora10)
		<tr>
			<td>{{ $subproceso->subproceso}}</td>
			<td style="text-align: right;" >{{ $sub_total }}</td>
			<td>
				<input type="date" id="fecha_inicio_{{$id_detalle}}_{{$subproceso->idsub}}" class="form-control"  onchange="guarda_seg_produccion('fecha_inicio',{{$id_detalle}},{{$subproceso->idsub}})" value="{{ $subproceso->fecha_inicio}}">
			</td>
			<td><input type="number" style="width: 80px;" id="hora1_{{$id_detalle}}_{{$subproceso->idsub}}" class="form-control" value="{{ $subproceso->hora1}}" onchange="guarda_seg_produccion('hora1',{{$id_detalle}},{{$subproceso->idsub}})"></td>
			<td><input type="number" style="width: 80px;" id="hora2_{{$id_detalle}}_{{$subproceso->idsub}}" class="form-control" value="{{ $subproceso->hora2}}" onchange="guarda_seg_produccion('hora2',{{$id_detalle}},{{$subproceso->idsub}})"></td>
			<td><input type="number" style="width: 80px;" id="hora3_{{$id_detalle}}_{{$subproceso->idsub}}" class="form-control" value="{{ $subproceso->hora3}}" onchange="guarda_seg_produccion('hora3',{{$id_detalle}},{{$subproceso->idsub}})"></td>
			<td><input type="number" style="width: 80px;" id="hora4_{{$id_detalle}}_{{$subproceso->idsub}}" class="form-control" value="{{ $subproceso->hora4}}" onchange="guarda_seg_produccion('hora4',{{$id_detalle}},{{$subproceso->idsub}})"></td>
			<td><input type="number" style="width: 80px;" id="hora5_{{$id_detalle}}_{{$subproceso->idsub}}" class="form-control" value="{{ $subproceso->hora5}}" onchange="guarda_seg_produccion('hora5',{{$id_detalle}},{{$subproceso->idsub}})"></td>
			<td><input type="number" style="width: 80px;" id="hora6_{{$id_detalle}}_{{$subproceso->idsub}}" class="form-control" value="{{ $subproceso->hora6}}" onchange="guarda_seg_produccion('hora6',{{$id_detalle}},{{$subproceso->idsub}})"></td>
			<td><input type="number" style="width: 80px;" id="hora7_{{$id_detalle}}_{{$subproceso->idsub}}" class="form-control" value="{{ $subproceso->hora7}}" onchange="guarda_seg_produccion('hora7',{{$id_detalle}},{{$subproceso->idsub}})"></td>
			<td><input type="number" style="width: 80px;" id="hora8_{{$id_detalle}}_{{$subproceso->idsub}}" class="form-control" value="{{ $subproceso->hora8}}" onchange="guarda_seg_produccion('hora8',{{$id_detalle}},{{$subproceso->idsub}})"></td>
			<td><input type="number" style="width: 80px;" id="hora9_{{$id_detalle}}_{{$subproceso->idsub}}" class="form-control" value="{{ $subproceso->hora9}}" onchange="guarda_seg_produccion('hora9',{{$id_detalle}},{{$subproceso->idsub}})"></td>
			<td><input type="number" style="width: 80px;" id="hora10_{{$id_detalle}}_{{$subproceso->idsub}}" class="form-control" value="{{ $subproceso->hora10}}" onchange="guarda_seg_produccion('hora10',{{$id_detalle}},{{$subproceso->idsub}})"></td>
			<td><input type="date" id="fecha_fin_{{$id_detalle}}_{{$subproceso->idsub}}" class="form-control" value="{{$subproceso->fecha_fin}}" onchange="guarda_seg_produccion('fecha_fin',{{$id_detalle}},{{$subproceso->idsub}})"></td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
@else
<h5>Agregue al menos un subproceso para la captura de horas</h5>
@endif