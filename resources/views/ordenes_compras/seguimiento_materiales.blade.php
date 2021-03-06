<?php 
$espesor = array(1,2,3,4,5,6,13,14);
$ancho = array(3,4,5,6,11,12,14);
$altura = array(5,6,7,8,9,10);
$peso = array(7,8,9,10,13);

 ?>
 @if(sizeof($material)>0)
	 @if($material[0]->asigan_meterial != 1)
	 <button class="btn btn-primary pull-right" onclick="finaliza_material_asigna({{ $material[0]->id_orden}},{{ $material[0]->id}},1)">Finaliza asignación</button>
	 <br><br>
	 @elseif($material[0]->asigan_meterial==1 && Auth::user()->tipo==1)
	 <button class="btn btn-primary pull-right" onclick="finaliza_material_asigna({{ $material[0]->id_orden}},{{ $material[0]->id}},0)">Modificar asignación</button>
	 <br><br>
	 @endif
 @endif
<table class="table table-bordered table-striped" id="tbl_materiales">
	<thead>
		<tr>
			<th colspan="">Inv. Materiales</th>
			<th>Id Material</th>
		</tr> 
	</thead>
	<tbody>
		@foreach($mat_forma as $mat_for)
		<tr>
			<td>
				<div>
					<h6><b>{{ $mat_for->forma}}</b></h6>
						@if(in_array($mat_for->idforma,$espesor))
				      		<span class="badge bg-blue-grey">Espesor: {{ $mat_for->espesor}}</span>
				      	@endif
				      	@if(in_array($mat_for->idforma,$ancho))
				      		<span class="badge bg-blue-grey">Ancho: {{$mat_for->ancho}}</span>
				      	@endif
				      	@if(in_array($mat_for->idforma,$altura))
				      		<span class="badge bg-blue-grey">Altura: {{$mat_for->altura}}</span>
				      	@endif
				      	@if(in_array($mat_for->idforma,$peso))
				      		<span class="badge bg-blue-grey">Peso por Distancia: {{$mat_for->peso_distancia}}</span>
				      	@endif
				</div>
			</td>
			<td>
				@foreach($material as $mat)
					@if($mat_for->idforma == $mat->idforma && ($mat_for->espesor==$mat->nespesor || $mat_for->ancho==$mat->nancho || $mat_for->altura==$mat->naltura || $mat_for->peso_distancia==$mat->npeso_distancia))
					 <div class="d-inline-block custom-control custom-checkbox mr-1">
                      <input type="checkbox" {{ $mat->id_forma ==$mat_for->id ?'checked':'' }} {{ ($mat->asigan_meterial==1)?'disabled':''}} class="custom-control-input" name="mat_{{ $mat->id_orden.'_'. $mat->id.'_'.$mat->idmaterial.'_'.$mat_for->id}}" id="mat_{{ $mat->id_orden.'_'. $mat->id.'_'.$mat->idmaterial.'_'.$mat_for->id}}" onchange="seguimiento_materiales({{ $mat->id_orden}},{{ $mat->id}},{{$mat->idmaterial}},{{$mat_for->id}})" >
                      <label class="custom-control-label" for="mat_{{ $mat->id_orden.'_'. $mat->id.'_'.$mat->idmaterial.'_'.$mat_for->id}}">
				      	@if(in_array($mat_for->idforma,$espesor) && $mat_for->espesor==$mat->nespesor)
				      		 <span class="badge badge-primary"> Espesor: {{ $mat->nespesor}} </span>
				      	@endif
				      	@if(in_array($mat_for->idforma,$ancho) && $mat_for->ancho==$mat->nancho)
				      		<span class="badge badge-primary"> Ancho: {{ $mat->nancho}}</span>
				      	@endif
				      	@if(in_array($mat_for->idforma,$altura) && $mat_for->altura==$mat->naltura)
				      		<span class="badge badge-primary"> Altura: {{ $mat->naltura}}</span>
				      	@endif
				      	@if(in_array($mat_for->idforma,$peso) && $mat_for->peso_distancia==$mat->npeso_distancia)
				      		<span class="badge badge-primary"> Peso distancia: {{ $mat->npeso_distancia}}</span>
				      	@endif
				      	@if($mat->colada_numero != '')
				      		<span class="badge badge-primary"> Colada: {{ $mat->colada_numero }}</span>
				      	@endif
                      </label>
                    </div>
					@endif
				@endforeach
			</td>
		</tr>  
		@endforeach	
	</tbody>
</table>