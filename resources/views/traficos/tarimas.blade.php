@php($i = 1)
<table class="table table-bordered table-striped small">
	<tr>
		<td># Tarima</td>
		<td>IDNS</td>
		<td>Peso Kg.</td>
		<td>Altura</td>
		<td>Ancho</td>
		<td>Largo</td>
		<td>Peso tarima</td>
		<td></td>
	</tr>
	@foreach($tarimas as $tar)
	<tr>
		<td>{{$i}}</td>
		<td>
			<select name="idns[]" onchange="actualiza_tarima('idns',{{$tar->id}},{{ $tar->id_trafico}})" id="idns{{$tar->id}}" class="select2-placeholder-multiple form-control" multiple="multiple" style="width: 150px;" >
					@foreach($traficos_detalle as $idns)
						<option value="{{$idns->id_detalle}}"
						@foreach($tarimas_idns as $taridns)
							
							@if($idns->id_detalle==$taridns->idn && $taridns->id_tarima == $tar->id)
								 {{'selected'}}
							@endif
						@endforeach
						>{{$idns->id_detalle}}</option>
					@endforeach
			</select>
		</td>
		<!--<td><input type="text" class="form-control" name="idns{{$tar->id}}" onchange="actualiza_tarima('idns',{{$tar->id}},{{ $tar->id_trafico}})" id="idns{{$tar->id}}" value="{{ $tar->idns}}"></td>--->
		<td><input type="number" step="any" min="0" name="peso{{$tar->id}}" onchange="actualiza_tarima('peso',{{$tar->id}},{{ $tar->id_trafico}})" id="peso{{$tar->id}}" class="form-control" value="{{ $tar->peso}}"></td>
		<td><input type="number" step="any" min="0" name="altura{{$tar->id}}" onchange="actualiza_tarima('altura',{{$tar->id}},{{ $tar->id_trafico}})" id="altura{{$tar->id}}" class="form-control" value="{{ $tar->altura}}"></td>
		<td><input type="number" step="any" min="0" name="ancho{{$tar->id}}" onchange="actualiza_tarima('ancho',{{$tar->id}},{{ $tar->id_trafico}})" id="ancho{{$tar->id}}" class="form-control" value="{{ $tar->ancho}}"></td>
		<td><input type="number" step="any" min="0" name="largo{{$tar->id}}" onchange="actualiza_tarima('largo',{{$tar->id}},{{ $tar->id_trafico}})" id="largo{{$tar->id}}" class="form-control" value="{{ $tar->largo}}"></td>
		<td><input type="number" step="any" min="0" name="pero_tarima{{$tar->id}}" onchange="actualiza_tarima('pero_tarima',{{$tar->id}},{{ $tar->id_trafico}})" id="pero_tarima{{$tar->id}}" class="form-control" value="{{ $tar->pero_tarima}}"></td>
		<td>
			<button class="btn btn-primary" onclick="borrar_tarima({{$tar->id}},{{ $tar->id_trafico}})"><i class="fa fa-trash"></i></button>
		</td>
	</tr>
	@php($i += 1)
	@endforeach
</table>