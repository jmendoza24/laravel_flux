<table class="table table-bordered">
	<tr style="background: #518a87; color: white;">
		<td></td>
		<td>Fecha inicio</td>
		<td>Foto</td>
		<td>Dias para entrega</td>
		<td></td>
	</tr>
	@foreach($procesos as $proc)
	<tr>
		<td colspan="5" style="color:#518a87; "><b>{{ $proc->procesos}}</b></td>
	</tr>
	@foreach($subprocesos as $sub)
		@if($sub->id_proceso == $proc->id)
		<form id="example-form" method="post" enctype="multipart/form-data">
			{!! csrf_field() !!}
			<tr>
				<td>{{ $sub->subproceso}}</td>
				<td><input type="date" id="fecha_inicio{{$sub->id}}" class="form-control" value="{{ $sub->fecha_inicio}}"></td>
				<td><input type="file" class="form-control" name="foto{{$sub->id}}" id="foto{{$sub->id}}" ></td>
				<td><input type="number" min="0" class="form-control" id="dias{{$sub->id}}" ></td>
				<td><button type="submit" class="btn btn-primary btn-xs" onclick="guarda_seguimiento({{$sub->id}})"><i class="fa fa-save"></i></button></td>
			</tr>
		</form>
		@endif
	@endforeach

	@endforeach
</table>