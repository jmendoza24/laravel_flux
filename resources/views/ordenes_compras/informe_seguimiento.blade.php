<ul class="nav nav-tabs nav-underline no-hover-bg">
    <li class="nav-item">
      <a class="nav-link active" id="base-tab31" data-toggle="tab" aria-controls="tab31"
      href="#tab31" aria-expanded="true">Materiales</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="base-tab32" data-toggle="tab" aria-controls="tab32" href="#tab32"
      aria-expanded="false">Avance</a>
    </li>
</ul>
<div class="tab-content px-1 pt-1">
	<div role="tabpanel" class="tab-pane active" id="tab31" aria-expanded="true" aria-labelledby="base-tab31">
	  
	</div>
	<div class="tab-pane" id="tab32" aria-labelledby="base-tab32">
		<div class="card collapse-icon accordion-icon-rotate left">
			<div class="bs-callout-primary callout-border-right callout-bordered callout-transparent p-1">
				<div class="row">
	          		<div class="col-md-6">
	              		<div class="form-group row">
					      <label class="col-md-4 label-control" for="userinput1">Fecha compromiso:</label>
					      <div class="col-md-8">
					        <input type="text" class="form-control pickadate-format" name="">
					        <div class="invalid-feedback">Este campo es requerido.</div>
					      </div>
					    </div>
				    </div>
				    <div class="col-md-6">
	              		<div class="form-group row">
					      <label class="col-md-3 label-control" for="userinput1">Dias:</label>
					      <div class="col-md-9">
					        <input type="text" class="form-control" name="">
					        <div class="invalid-feedback">Este campo es requerido.</div>
					      </div>
					    </div>
				    </div>
				    <div class="col-md-6">
					    <div class="form-group row">
					      <label class="col-md-4 label-control" for="userinput1">Fecha Entrega:</label>
					      <div class="col-md-8">
					        <input type="text" class="form-control pickadate-format" name="">
					        <div class="invalid-feedback">Este campo es requerido.</div>
					      </div>
					    </div>
					</div>
					<div class="col-md-6">
	              		<div class="form-group row">
					      <label class="col-md-3 label-control" for="userinput1">Avance:</label>
					      <div class="col-md-6">
					        <input type="text" class="form-control" name="">
					        <div class="invalid-feedback">Este campo es requerido.</div>
					      </div>
					      <div class="col-md-3">
					      	<button class="btn btn-float btn-outline-success" title="Dibujo"><i class="ft-image"></i></button>
					      </div>
					    </div>
				    </div>
	          	</div>
            </div>
			@php($i = 1)
			@foreach($procesos as $proc)
			<div id="headingCollapse{{ $proc->id}}" class="card-header">
              <a data-toggle="collapse" href="#collapse{{ $proc->id}}" aria-expanded="false" aria-controls="collapse{{ $proc->id}}" 
              class="card-title lead">{{ $proc->procesos}}</a>
            </div>
				<div id="collapse{{ $proc->id}}" role="tabpanel" aria-labelledby="headingCollapse{{ $proc->id}}" class="collapse">
	              <div class="card-content">
	              	<div class="bs-callout-primary callout-border-right callout-bordered callout-transparent p-1">
				<div class="row">
	          		<div class="col-md-6">
	              		<div class="form-group row">
					      <label class="col-md-4 label-control" for="userinput1">Horas:</label>
					      <div class="col-md-8">
					        <input type="text" class="form-control" name="">
					        <div class="invalid-feedback">Este campo es requerido.</div>
					      </div>
					    </div>
				    </div>
				    <div class="col-md-6">
	              		<div class="form-group row">
					      <label class="col-md-3 label-control" for="userinput1">Fecha inicio:</label>
					      <div class="col-md-9">
					        <input type="date" class="form-control" name="">
					        <div class="invalid-feedback">Este campo es requerido.</div>
					      </div>
					    </div>
				    </div>
				    <div class="col-md-6">
					    <div class="form-group row">
					      <label class="col-md-4 label-control" for="userinput1">Horas reales</label>
					      <div class="col-md-8">
					        <input type="text" class="form-control"name="">
					        <div class="invalid-feedback">Este campo es requerido.</div>
					      </div>
					    </div>
					</div>
	          	</div>
            </div>
	              	@foreach($subprocesos as $sub)
						@if($sub->id_proceso == $proc->id)
						<div class="bs-callout-warning callout-square callout-bordered mt-1">
	                      <div class="media align-items-stretch">
	                        <div class="d-flex align-items-center bg-warning p-2">
	                          <i class="fa fa-database white font-medium-5"></i>
	                        </div>
	                        <div class="media-body p-1">
	                        	<div class="row">
	                        		<div class="col-md-6"><strong>{{ $sub->subproceso}}</strong></div>
	                        		<div class="col-md-6" style="text-align: right;">
	                        			<button class="btn btn-float btn-outline-info btn-sm" title="Dibujo"><i class="ft-image"></i></button>
	                        			<input type="submit" class="btn btn-promary" value="Guardar" name="">

	                        		</div>	                          
	                      		</div>
	                      		<hr>
	                          	<div class="row">
					          		<div class="col-md-6">
					              		<div class="form-group row">
									      <label class="col-md-4 label-control" for="userinput1">Fotos:</label>
									      <div class="col-md-8">
									        <input type="file" class="form-control" name="">
									      </div>
									    </div>
								    </div>
								    <div class="col-md-6">
					              		<div class="form-group row">
									      <label class="col-md-4 label-control" for="userinput1">Comentarios:</label>
									      <div class="col-md-8">
									        <textarea class="form-control"></textarea>
									      </div>
									    </div>
								    </div>
								</div>
	                        </div>
	                      </div>
	                    </div>
	                	@endif
					@endforeach
	              </div>
	            </div>
				
			 @php($i = $i +1)
			@endforeach

          </div>
	</div>
</div>

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
    $('.pickadate-format').pickadate();
});
</script>
@endsection

