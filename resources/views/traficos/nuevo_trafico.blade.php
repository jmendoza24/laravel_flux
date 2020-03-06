<form id="nueva_tarima" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input type="hidden" name="id_tarima" value="{{ $tarimas->id}}">
  <input type="hidden" name="trafico" value="{{ $trafico}}">

<div class="row">
    <div class="col-md-6">
    	<div class="form-group row">
      		<label class="col-md-3 label-control" for="userinput2">Ship to</label>
  			<div class="col-md-9">
  				<select class="form-control" name="shipping_id" id="shipping_id" onchange="obtiene_idns({{ $trafico}})">
			        <option value="">Seleccione...</option>
			        @foreach($logisticas as $logistica)
			        <option value="{{$logistica->id}}" {{ ($tarimas->shipping_id==$logistica->id)?'selected':''}}  >
			          {{$logistica->calle . ', ' .$logistica->municipio .', '. $logistica->nestado .', '. $logistica->npais}}
			        </option>
			        @endforeach
			    </select>
		    </div>
		</div>
  	</div>
  	<div class="col-md-6">
    	<div class="form-group row">
      		<label class="col-md-3 label-control" for="userinput2">IDNs:</label>
  			<div class="col-md-9">
  				<select name="idns[]" class="select2-placeholder-multiple form-control" multiple="multiple" id="idns_mul">
            <option value="">Seleccione..</option>
            @foreach($traficos_detalle as $det)
                @foreach($tarimas_idns as $idn)
                  @if($idn->id_tarima==$tarimas->id)  
                    <option value="{{ $det->id}}" {{ ($det->id== $idn->idn)?'selected':'' }}>{{ $det->id}}</option>
                  @endif
                @endforeach              
            @endforeach
				</select>
		    </div>
		</div>
  	</div>
  	<div class="col-md-6">
    	<div class="form-group row">
      		<label class="col-md-3 label-control" for="userinput2">Peso Kg:</label>
  			<div class="col-md-9">
  				<input type="number" min="0" step="any" name="peso" id="peso" class="form-control" value="{{ $tarimas->peso}}">
		    </div>
		</div>
  	</div>
  	<div class="col-md-6">
    	<div class="form-group row">
      		<label class="col-md-3 label-control" for="userinput2">Altura:</label>
  			<div class="col-md-9">
  				<input type="number" min="0" step="any" name="altura" id="altura" class="form-control" value="{{ $tarimas->altura}}">
		    </div>
		</div>
  	</div>
  	<div class="col-md-6">
    	<div class="form-group row">
      		<label class="col-md-3 label-control" for="userinput2">Ancho:</label>
  			<div class="col-md-9">
  				<input type="number" min="0" step="any" name="ancho" id="ancho" class="form-control" value="{{ $tarimas->ancho}}">
		    </div>
		</div>
  	</div>
  	<div class="col-md-6">
    	<div class="form-group row">
      		<label class="col-md-3 label-control" for="userinput2">Largo:</label>
  			<div class="col-md-9">
  				<input type="number" min="0" step="any" name="largo" id="largo" class="form-control" value="{{ $tarimas->largo}}">
		    </div>
		</div>
  	</div>
  	<div class="col-md-6">
    	<div class="form-group row">
      		<label class="col-md-3 label-control" for="userinput2">Peso tarima:</label>
  			<div class="col-md-9">
  				<input type="number" min="0" step="any" name="pero_tarima" id="pero_tarima" class="form-control" value="{{ $tarimas->pero_tarima}}">
		    </div>
		</div>
  	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<span class="btn btn-primary pull-right"  onclick="guarda_tarima()"><i class="fa fa-save"></i> Guardar</span>
	</div>
</div>
</form>