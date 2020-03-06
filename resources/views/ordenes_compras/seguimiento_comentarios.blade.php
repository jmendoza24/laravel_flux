<h3 id="titulo_tabla">{{ $data['nom_col']}}</h3> <br>
<div class="col-md-12">
	<label>Comentarios:</label>
	<textarea class="form-control" id="comentario_seg" style="height: 250px;">{{ $data['valor']}}</textarea>
</div>
<hr>
<div class="col-md-12" style="text-align: right;">
	<button class="btn btn-success" onclick="guarda_planeacion({{ $data['columna']}},{{ $data['id_detalle']}},{{$data['id_orden']}});">
		Guardar
	</button>
</div>
