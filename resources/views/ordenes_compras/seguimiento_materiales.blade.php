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
						<span class="badge bg-blue-grey">Espesor(Thickness): {{ $mat_for->espesor}}</span>
						<span class="badge bg-blue-grey">Ancho (Wide): {{$mat_for->ancho}}</span>
						<span class="badge bg-blue-grey">Altura (Height): {{$mat_for->altura}}</span>
						<span class="badge bg-blue-grey">Peso por Distancia: {{$mat_for->peso_distancia}}</span>
				</div>
			</td>
			<td>
				<div class="row skin skin-line">
				  <div class="col-sm-12" style="">
					@foreach($material as $mat)
						@if($mat_for->idforma== $mat->idforma and $mat->idmaterial > 0)
						<fieldset >
					      <input type="radio" name="input-radio-4" id="input-radio-15">
					      <label for="input-radio-15" >{{ $mat->nforma}} | Espesor: {{ $mat->espesor}} | Ancho: {{ $mat->ancho}} | Altura: {{ $mat->altura}} | Peso distancia: {{ $mat->peso_distancia}}</label>
					    </fieldset>
						@endif
					@endforeach
				  </div>
				</div>
			</td>
		</tr>  
		@endforeach	
	</tbody>
</table>
<script src="{{ url('app-assets/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>