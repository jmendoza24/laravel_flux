<?php 
$espesor = array(1,2,3,4,5,6,13,14);
$ancho = array(3,4,5,6,11,12,14);
$altura = array(5,6,7,8,9,10);
$peso = array(7,8,9,10,13);

 ?>
<table class="table table-bordered table-striped" id="tbl_materiales">
	<thead>
		<tr>
			<th colspan="">Materiales</th>
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
				      		<span class="badge bg-blue-grey">Espesor(Thickness): {{ $mat_for->espesor}}</span>
				      	@endif
				      	@if(in_array($mat_for->idforma,$ancho))
				      		<span class="badge bg-blue-grey">Ancho (Wide): {{$mat_for->ancho}}</span>
				      	@endif
				      	@if(in_array($mat_for->idforma,$altura))
				      		<span class="badge bg-blue-grey">Altura (Height): {{$mat_for->altura}}</span>
				      	@endif
				      	@if(in_array($mat_for->idforma,$peso))
				      		<span class="badge bg-blue-grey">Peso por Distancia: {{$mat_for->peso_distancia}}</span>
				      	@endif
				</div>
			</td>
			<td>
					@foreach($material as $mat)
						@if($mat_for->idforma == $mat->idforma)
						 <div class="d-inline-block custom-control custom-checkbox mr-1">
	                      <input type="checkbox" {{ $mat->id_materia >0?'checked':'' }} class="custom-control-input" name="mat_{{ $mat->id_orden.'_'. $mat->id.'_'.$mat->idmaterial}}" id="mat_{{ $mat->id_orden.'_'. $mat->id.'_'.$mat->idmaterial}}" onchange="seguimiento_materiales({{ $mat->id_orden}},{{ $mat->id}},{{$mat->idmaterial}})" >
	                      <label class="custom-control-label" for="mat_{{ $mat->id_orden.'_'. $mat->id.'_'.$mat->idmaterial}}">
	                      	<!--{{ $mat->nforma}} <br>-->
					      	@if(in_array($mat_for->idforma,$espesor))
					      		 <span class="badge badge-primary"> Espesor: {{ $mat->nespesor}} </span>
					      	@endif
					      	@if(in_array($mat_for->idforma,$ancho))
					      		<span class="badge badge-primary"> Ancho: {{ $mat->nancho}}</span>
					      	@endif
					      	@if(in_array($mat_for->idforma,$altura))
					      		<span class="badge badge-primary"> Altura: {{ $mat->naltura}}</span>
					      	@endif
					      	@if(in_array($mat_for->idforma,$peso))
					      		<span class="badge badge-primary"> Peso distancia: {{ $mat->npeso_distancia}}</span>
					      	@endif
					      		<span class="badge badge-primary"> Colada: {{ $mat->colada_numero }}</span>
	                      </label>
	                    </div>
						@endif
					@endforeach
			</td>
		</tr>  
		@endforeach	
	</tbody>
</table>