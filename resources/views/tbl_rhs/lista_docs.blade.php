<div class="row">
@if($conteos->doc2 > 0)
<div class="col-md-6">
	<table class="table table-striped table-bordered">
		<thead class="bg-success">
			<tr>
				<th>Accidente o Incidente</th>
				<td>Fecha</td>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($documentos as $d)
				@if($d->id_documento ==2)
					<tr>
						<td>@if($d->archivo != '') <a id="doc2" href="{{ $d->archivo}}" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a> @endif
						 {{ $d->descripcion}}</td>
						<td>{{ $d->fecha}}</td>
						<td style="width: 50px;"><span onclick="elimina_catalogo(3,{{ $d->id}},'',{{$d->id_empleado}})"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span></td>
					</tr>
				@endif
			@endforeach
		</tbody>
	</table>
</div>
<br>
@endif
@if($conteos->doc3 > 0)
<div class="col-md-6">
	<table class="table table-striped table-bordered" >
		<thead class="bg-success">
			<tr>
				<th>Reporte de Conducta</th>
				<td>Fecha</td>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($documentos as $d)
				@if($d->id_documento ==3)
					<tr>
						<td>@if($d->archivo != '') <a id="doc2" href="{{ $d->archivo}}" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a> @endif
						 {{ $d->descripcion}}</td>
						<td>{{ $d->fecha}}</td>
						<td style="width: 50px;"><span onclick="elimina_catalogo(3,{{ $d->id}},'',{{$d->id_empleado}})"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span></td>
					</tr>
				@endif
			@endforeach
		</tbody>
	</table>
</div>
<br>
@endif
@if($conteos->doc4 > 0)
<div class="col-md-6">
	<table class="table table-striped table-bordered">
		<thead class="bg-success">
			<tr>
				<th>Reporte Médico</th>
				<td>Fecha</td>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($documentos as $d)
				@if($d->id_documento ==4)
					<tr>
						<td>@if($d->archivo != '') <a id="doc2" href="{{ $d->archivo}}" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a> @endif
						 {{ $d->descripcion}}</td>
						<td>{{ $d->fecha}}</td>
						<td style="width: 50px;"><span onclick="elimina_catalogo(3,{{ $d->id}},'',{{$d->id_empleado}})"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span></td>
					</tr>
				@endif
			@endforeach
		</tbody>
	</table>
</div>
<br>
@endif
@if($conteos->doc5 > 0)
<div class="col-md-6">
	<table class="table table-striped table-bordered">
		<thead class="bg-success">
			<tr>
				<th>Entrenamiento y Certificación</th>
				<td>Fecha</td>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($documentos as $d)
				@if($d->id_documento ==5)
					<tr>
						<td>@if($d->archivo != '') <a id="doc2" href="{{ $d->archivo}}" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a> @endif
						 {{ $d->descripcion}}</td>
						<td>{{ $d->fecha}}</td>
						<td style="width: 50px;"><span onclick="elimina_catalogo(3,{{ $d->id}},'',{{$d->id_empleado}})"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span></td>
					</tr>
				@endif
			@endforeach
		</tbody>
	</table>
</div>
@endif
</div>