<div class="col-md-12">
	 <h5>Expediente</h5>
	 <hr>
	 <table class="table table-striped table-bordered">
	   <tr class="btn-primary text-center">
	     <td><b>Documentos</b></td>
	     <td><b>SI</b></td>
	     <td><b>NO</b></td>
	     <td><b>NA</b></td>
	   </tr>
	   @foreach($docs as $doc)
	   <tr class="text-center">
	     <td class="text-left">{{ $doc->documento}}</td>
	     <td><input type="radio" name="dc_{{$doc->id}}" value="1" {{ $doc->existe ==1 ? 'checked' : ''}} onchange="guarda_check({{ $id }},1,{{$doc->id}})"></td>
	     <td><input type="radio" name="dc_{{$doc->id}}" value="2" {{ $doc->existe ==2 ? 'checked' : ''}} onchange="guarda_check({{ $id }},2,{{$doc->id}})"></td>
	     <td><input type="radio" name="dc_{{$doc->id}}" value="3" {{ $doc->existe ==3 ? 'checked' : ''}} onchange="guarda_check({{ $id }},3,{{$doc->id}})"></td>
	   </tr>
	   @endforeach
	   <tr>
	     <td colspan="4" style="border: 2px solid #518a87;">@if($expediente->archivo != '') <a id="doc2" href="{{ $expediente->archivo}}" target="_blank" > <span><i class="fa fa-file-pdf-o"></i> <b >Expediente</b></span></a> @endif</td>
	   </tr>
	 </table>
</div>
@foreach($conteos as $c)
	@if($c->id_documento == 2 and $c->conteo > 0)
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
								<td style="width: 50px;"><span onclick="elimina_catalogo(3,{{ $d->id}},'',{{$d->id_empleado}},1)"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span></td>
							</tr>
						@endif
					@endforeach
				</tbody>
			</table>
		</div>
		<br>
	@endif
	@if($c->id_documento == 3 and $c->conteo > 0)
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
								<td style="width: 50px;"><span onclick="elimina_catalogo(3,{{ $d->id}},'',{{$d->id_empleado}},1)"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span></td>
							</tr>
						@endif
					@endforeach
				</tbody>
			</table>
		</div>
		<br>
	@endif
	@if($c->id_documento == 4 and $c->conteo > 0)
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
								<td style="width: 50px;"><span onclick="elimina_catalogo(3,{{ $d->id}},'',{{$d->id_empleado}},1)"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span></td>
							</tr>
						@endif
					@endforeach
				</tbody>
			</table>
		</div>
		<br>	
	@endif
	@if($c->id_documento == 5 and $c->conteo > 0)
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
@endforeach
