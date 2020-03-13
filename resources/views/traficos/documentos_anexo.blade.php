<table class="table table-bordered table-striped">
	<thead class="bg-success">
		<tr>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Fecha</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($anexos as $anex)
		<tr>
			<td>{{ $anex->nombre}}</td>
			<td>{{ $anex->descripcion}}</td>
			<td>{{  date("m-d-Y", strtotime($anex->fecha)) }}</td>
			<td>
				<span class="btn btn-outline-primary btn-round" onclick="borra_documento_anexo({{ $anex->id_trafico}},{{ $anex->id}})"><i class="fa fa-trash"></i></span>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>