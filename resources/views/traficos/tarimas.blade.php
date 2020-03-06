@php($i = 1)
<div style="width: 100%; overflow-x: scroll;">
<table class="table table-bordered table-striped" id="tarimas_table">
	<tr>
		<td># Tarima</td>
		<td>IDNS</td>
		<td>Peso Kg.</td>
		<td>Altura</td>
		<td>Ancho</td>
		<td>Largo</td>
		<td>Peso tarima</td>
		<td>Ship to</td>
		<td></td>
	</tr>
	@foreach($tarimas as $tar)
	<tr>
		<td>
			<span class="badge badge-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#default"  onclick="nueva_tarima({{ $tar->id_trafico}},{{ $tar->id}})"><b>{{$i}}</b> - {{ $tar->id}}</span>	            		
		</td>
		<td>
			@foreach($tarimas_idns as $taridns)
				@if($tar->id== $taridns->id_tarima)
					 {{$taridns->idn}} ,
				@endif
			@endforeach
		</td>
		<td>{{ $tar->peso}}</td>
		<td>{{ $tar->altura}}</td>
		<td>{{ $tar->ancho}}</td>
		<td>{{ $tar->largo}}</td>
		<td>{{ $tar->pero_tarima}}</td>
		<td>
			{{$tar->calle }}, {{ $tar->numero }}, {{ $tar->nmunicipio}}, {{ $tar->nestado}}, {{ $tar->npais}}
		</td>
		<td>
			<button class="btn btn-primary" onclick="borrar_tarima({{$tar->id}},{{ $tar->id_trafico}})"><i class="fa fa-trash"></i></button>
		</td>
	</tr>
	@php($i += 1)
	@endforeach
</table>
</div>