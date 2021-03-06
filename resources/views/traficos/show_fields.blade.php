<div class="col-md-12" style="border: 10x solid red; max-height: 500px; overflow-y: scroll;" id="tamano_ventana">
	@php($doc_1 = '')
	@php($doc_2 = '')
	@php($doc_3 = '')
	@php($doc_4 = '')
	@php($doc_5 = '')
	@php($doc_6 = '')
	@php($doc_7 = '')
	@php($doc_8 = '')
	@php($doc_9 = '')
	@php($doc_10 = '')
	@php($doc_11 = '')
	@php($doc_12 = '')
	@php($doc_13 = '')
	@php($doc_14 = '')
	@php($doc_15 = '')
	@php($doc_16 = '')
	@php($doc_17 = '')
	@php($doc_18 = '') 
	@php($doc_19 = '') 
	@php($doc_20 = '') 
	@php($doc_20 = '') 
	
	@foreach($files as $file)
		@if($file->documento==1) @php($doc_1 = $file->file)@endif
		@if($file->documento==2) @php($doc_2 = $file->file)@endif
		@if($file->documento==3) @php($doc_3 = $file->file)@endif
		@if($file->documento==4) @php($doc_4 = $file->file)@endif
		@if($file->documento==5) @php($doc_5 = $file->file)@endif
		@if($file->documento==6) @php($doc_6 = $file->file)@endif
		@if($file->documento==7) @php($doc_7 = $file->file)@endif
		@if($file->documento==8) @php($doc_8 = $file->file)@endif
		@if($file->documento==9) @php($doc_9 = $file->file)@endif
		@if($file->documento==10)@php($doc_10 = $file->file)@endif
		@if($file->documento==11)@php($doc_11 = $file->file)@endif
		@if($file->documento==12)@php($doc_12 = $file->file)@endif
		@if($file->documento==13)@php($doc_13 = $file->file)@endif
		@if($file->documento==14)@php($doc_14 = $file->file)@endif
		@if($file->documento==15)@php($doc_15 = $file->file)@endif
		@if($file->documento==16)@php($doc_16 = $file->file)@endif
		@if($file->documento==17)@php($doc_17 = $file->file)@endif
								  
		@if($file->documento==18)@php($doc_18 = $file->file)@endif 
		@if($file->documento==19)@php($doc_19 = $file->file)@endif 
		@if($file->documento==20)@php($doc_20 = $file->file)@endif 
		@if($file->documento==20)@php($doc_20 = $file->file)@endif
	@endforeach
	<br>
	<div class="row" id="lista_documentos">
		<div class="col-md-12" style="" >
	      <div class="card" style=" border:2px solid #518a87 !important;">
	        <div class="card-header" style="background: #F5F7FA;">
	          	<h6 class="card-title">Carga de documentos:
	          		<span class="pull-right" style="cursor: pointer;" data-toggle="modal" data-target="#default" onclick="informacion_trafico({{ $trafico}})">
	          			<i class="fa fa-info-circle fa-2x {{ ($estatus_i[0]->conteo==7)?'success_info':'warning'}}" aria-hidden="true"></i>
	          		</span>
	      		</h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="card-text">
	              <form class="form-group card-body" id="documentos_seguimiento" enctype="multipart/form-data">
	              	{{ csrf_field() }}
	              	<input type="hidden" name="id_trafico" value="{{ $trafico}}">
	              	<div class="row">
						<div class="form-group col-md-4">
						    <select class="form-control" name="tipo_documento">
						    	<optgroup label="Documentos">
									<option value="">Documento...</option>
									<option value="1">TR Confirmation</option>
									<option value="2">Pickup Delivery Note</option>
									<option value="3">Validacion de Fracciones Mexico</option>
									<option value="4">Factura PDF (Planta México a FLUX USA)</option>
									<option value="5">Factura XML</option>
									<option value="6">Cotizacion de Ag. Aduanal MX</option>
									<option value="7">Comprobante de Pago Ag. Aduanal</option>
									<option value="8">Pedimento Aduana MX</option>
									<option value="9">DODA</option>
									<option value="10">POD Firmado</option>
									<option value="11">Verificacion Fracciones USA</option>
									<option value="12">Pre File (Shipment Advice)</option>
									<option value="13">Carta de Aduana</option>
									<option value="14">Bill of Lading USA</option>
									<option value="15">Documento de Entrega (firmado)</option>
								</optgroup>
								<optgroup label="POD firmados">
									@foreach($tarimas_pod as $pod)
										<option value="{{ $trafico}}.{{ $pod->shipping_id}}">POD - ({{ $pod->shipping_id }}) {{$pod->calle . ', ' .$pod->municipio .', '. $pod->nestado .', '. $pod->npais}}</option>
									@endforeach
								</optgroup>
								<!--<option value="16">Nota Credito</option>
								<option value="17">NCR</option>-->
							</select>
						</div>
						<div class="form-group col-md-4">
						    <input type="file" name="documento_carga" class="form-control">
						</div>
						<div class="form-group col-md-2">
						    <span class="btn btn-primary pull-right" onclick="carga_documentos_trafico()">Cargar</span>
						</div>
						</div>
					</form>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header">
	            <h3>Indicadores de colores en documentos</h3>
	          <h6 class="card-title">
	              <table>
	    		<tr>
	    			<td><b>Documentos Autogenerados</b></td>
	    			<td class="btn-primary"></td>
	    		</tr><br>
	    		<tr>
	    			<td><b>Documentos Cargados</b></td>
	    			<td class="btn-secondary"></td>
	    		</tr><br>
	    		<tr>
	    			<td><b>Documentos Autogenerados</b></td>
	    			<td class="bg-success"></td>
	    		</tr>
	    	</table><br><br>
	    	Tarimas:
	          	<span class="form-inline pull-right" style="font-size: 14px;">
	          		Planta Concentradora: &nbsp;
	          		<select class="form-control mr-1" id="id_planta" onchange="guarda_planta_trafico('id_planta',{{ $trafico}})">
		          		<option value="">Planta</option>
		          		@foreach($plantas as $pla)
		          		<option value="{{ $pla->id}}" {{ ($info_trafico->id_planta==$pla->id)?'selected':''}}>{{ $pla->nombre}}</option>
		          		@endforeach
		          	</select>
		          	<span class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#default"  onclick="nueva_tarima({{ $trafico}},0)"><i class="fa fa-plus"></i> Tarimas</span>	            				          	
		      </span>
		      
	          </h6>
	          
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="card-text">
	            	<div id="listado_tarimas">
	              		@include('traficos.tarimas')
					</div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header">
	          <h6 class="card-title">Aviso de Embarque:</h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="card-text" id="preparacion_pod">
	            	@include('traficos.preparacion_pod')
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header">
	          <h6 class="card-title">Confirmación de Envío:</h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="card-text">
	            	<a href="{{ ($doc_1 !='')? url($doc_1):'#'}}" {{ ($doc_1 !='')?'target="_blank"':''}}><button class="btn btn-float btn-{{ ($doc_1 !='')?'primary':'secondary'}} col-md-2" {{ ($doc_1 !='')?'':'disabled'}}><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>TR Confirmation</button></a>
					<a href="{{ ($doc_2 !='')? url($doc_2):'#'}}" {{ ($doc_1 !='')?'target="_blank"':''}}><button class="btn btn-float btn-{{ ($doc_2 !='')?'primary':'secondary'}} col-md-2" {{ ($doc_2 !='')?'':'disabled'}}><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Pickup Delivery Note</button></a>		
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header">
	          <h6 class="card-title">POD (firmado):</h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="card-text">
	            	@foreach($tarimas_pod as $pod)
	            		@foreach($files as $file)
	            			@php($arr = explode(".", $file->documento))
	            				@if($arr[0]==$trafico && $arr[1]==$pod->shipping_id)
	            					<a href="{{ ($file->file !='')? url($file->file):'#'}}" {{ ($file->file !='')?'target="_blank"':''}}><button class="btn btn-float btn-{{ ($file->file !='')?'primary':'secondary'}} col-md-2" {{ ($file->file !='')?'':'disabled'}}><i class="fa fa-file-pdf-o" aria-hidden="true"></i><label style="font-size: 11px;"> POD - {{$pod->calle . ', ' .$pod->municipio .', '. $pod->nestado .', '. $pod->npais}}</label></button></a>
	            				@endif
	            		@endforeach
	            	@endforeach
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <form id="informacion_flete" enctype="multipart/form-data">
	    <div class="col-md-12">
            {{ csrf_field() }}
	      <div class="card">
	        <div class="card-header">
	          <h6 class="card-title">Información de flete <span class="btn btn-primary pull-right" onclick="guarda_flete()"><i class="fa fa-save"></i> Guardar</span></h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="row">
            		<input type="hidden" name="id_trafico" value="{{ $trafico}}">
            		<input type="hidden" name="aduanal_mx" id="aduanal_mx" class="form-control" value="">
				
					<div class="form-group col-md-3">
					    {!! Form::label('no_plataforma', 'Plataforma #') !!}
					    <input type="text" name="no_plataforma" id="no_plataforma" class="form-control" value="{{ $fletes->no_plataforma}}">
					</div>
					<div class="form-group col-md-3">
					    {!! Form::label('placas', 'Placas') !!}
					    <input type="text" name="placas" id="placas" class="form-control" value="{{ $fletes->placas}}">
					</div>
					<div class="form-group col-md-3">
					    {!! Form::label('amb_largo', 'Largo') !!}
					    <input type="text" name="amb_largo" id="amb_largo" class="form-control" value="{{ $fletes->largo}}">
					</div>
					<div class="form-group col-md-3">
					    {!! Form::label('pais_or', 'País de Origen(Unidad)') !!}
					    <input type="text" name="pais_or" id="pais_or" class="form-control" value="{{ $fletes->pais_orige}}">
					</div>
					<div class="form-group col-md-3">
					    {!! Form::label('scac', 'SCAC') !!}
					    <input type="text" name="scac" id="scac" class="form-control" value="{{ $fletes->scac}}">
					</div>
					<div class="form-group col-md-3">
					    {!! Form::label('caat', 'CAAT') !!}
					    <input type="text" name="caat" id="caat" class="form-control" value="{{ $fletes->caat}}">
					</div>

					<input type="hidden" name="entrada_camion" id="entrada_camion" class="form-control" value="">
					<input type="hidden" name="salida_camion" id="salida_camion" class="form-control" value="">
						
					</div>
	            </div>
	          </div>
	        </div>
	    </div>
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header">
	          <h6 class="card-title">Información de Aduana: <span class="btn btn-primary pull-right" onclick="guarda_flete()"><i class="fa fa-save"></i> Guardar</span></h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="card-text row">
	            	<div class="form-group col-md-6">
					    {!! Form::label('fraccion_arra_mx', 'Agencia aduanal MX:') !!}
						<input type="text" name="fraccion_arra_mx" class="form-control" id="fraccion_arra_mx" value="{{$fletes->fraccion_arra_mx}}" >
					</div>
					<div class="form-group col-md-6">
					    {!! Form::label('fraccion_arra', 'Agencia aduanal USA:') !!}
						<input type="text" name="fraccion_arra" class="form-control" id="fraccion_arra" value="{{$fletes->fraccion_arra}}" >
					</div>
					<div class="form-group col-md-4">
					    {!! Form::label('num_referencia', 'Número de Referencia Expeditors') !!}
					    <input type="text" name="num_referencia" id="num_referencia" class="form-control" value="{{ $fletes->no_referencia}}">
					</div>
					<div class="form-group col-md-4">
					    {!! Form::label('fecha_entrega', 'Fecha recolección') !!}
					    <input type="text" name="fecha_entrega" id="fecha_entrega" class="form-control" value="{{ $fletes->fecha_entrega}}">
					</div>
					<div class="form-group col-md-4">
					    {!! Form::label('tipo_cambio', 'Tipo cambio') !!}
					    <input type="text" name="tipo_cambio" id="tipo_cambio" class="form-control" value="{{ $fletes->tipo_cambio}}">
					</div>
	            </div>
	            <div class="row">
					<div class="col-md-3">
						<a href="{{$fletes->agencia_mx != '' ? route('download.notificacion',['id_trafico'=>$trafico]) : '#'}}" {{$fletes->agencia_mx != '' ? 'target="_blank"':''}}>
							<span class="btn btn-float btn-{{$fletes->agencia_mx != '' ?'primary':'secondary'}} ">
								<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Notificacion de Embarque
							</span>
						</a>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered table-striped">
							<tr>
								<td>IDN</td>
								<td>No. Parte</td>
								<td>Fracción MX</td>
								<td>Fracción US</td>
							</tr>
							@foreach($flete_fracciones as $for_ind)
							<tr>
								<td>FM{{str_pad($for_ind->id_detalle,6,"0",STR_PAD_LEFT)}}</td>
								<td>{{ $for_ind->numero_parte}}</td>
								<td>
									<input type="text" id="fraccion_mx_{{ $for_ind->id_detalle}}" onchange="guarda_fracciones('fraccion_mx',{{ $for_ind->id_detalle}},{{ $trafico}})" class="form-control" value="{{ $for_ind->fraccion_mx}}">
								</td>
								<td>
									<input type="text" id="fraccion_us_{{ $for_ind->id_detalle}}" onchange="guarda_fracciones('fraccion_mx',{{ $for_ind->id_detalle}},{{ $trafico}})" class="form-control" value="{{ $for_ind->fraccion_us}}">
								</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header">
	          <h6 class="card-title">Documentación Trámites México:</h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="row">
	            	<a href="{{ ($doc_3 !='')? url($doc_3):'#'}}" {{ ($doc_3 !='')?'target="_blank"':''}} class="col-md-3" >
	            		<button class="btn btn-float btn-{{ ($doc_3 !='')?'primary':'secondary'}}" {{ ($doc_3 !='')?'':'disabled'}} style="margin-bottom: 3px; width: 100%;">
	            			<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Validacion de Fracciones MX
	            		</button>
	            	</a>
	            </div>
	            <br>
	            <div class="row">
	            	<a href="{{ route('download.complemento_ext',['id_trafico'=>$trafico])}}" class="col-md-3" target="_blank">
						<span class="btn btn-float btn-primary ">
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Comp. Comercio Exterior
						</span>
					</a>
	            	<!--<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></button>-->
	            </div>
	            <br>
	            <div class="row">
	            	<a href="{{ ($doc_5 !='')? url($doc_5):'#'}}" {{ ($doc_5 !='')?'target="_blank"':''}} class="col-md-3">
	            		<button class="btn btn-float btn-{{ ($doc_5 !='')?'primary':'secondary'}}" {{ ($doc_5 !='')?'':'disabled'}} style="margin-bottom: 3px; width: 100%">
	            			<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Fact FLUX MX-US (XML)
	            		</button>
	            	</a>
	            	<a href="{{ ($doc_4 !='')? url($doc_4):'#'}}" {{ ($doc_4 !='')?'target="_blank"':''}} class="col-md-3">
						<button class="btn btn-float btn-{{ ($doc_4 !='')?'primary':'secondary'}}" {{ ($doc_4 !='')?'':'disabled'}} style="margin-bottom: 3px; width: 100%">
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Fact FLUX MX-US (PDF)
						</button>
					</a>
	            </div>
	            <br>
	            <div class="row">
	            	<a href="{{ ($doc_6 !='')? url($doc_6):'#'}}" {{ ($doc_6 !='')?'target="_blank"':''}} class="col-md-3">
	            		<button class="btn btn-float btn-{{ ($doc_6 !='')?'primary':'secondary'}} " {{ ($doc_6 !='')?'':'disabled'}} style="margin-bottom: 3px; width: 100%;">
	            			<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Cot. Ag. Ad. MX
	            		</button>
	            	</a>
	            	<a href="{{ ($doc_7 !='')? url($doc_7):'#'}}" {{ ($doc_7 !='')?'target="_blank"':''}} class="col-md-3">
	            		<button class="btn btn-float btn-{{ ($doc_7 !='')?'primary':'secondary'}}" {{ ($doc_7 !='')?'':'disabled'}} style="margin-bottom: 3px; width: 100%;">
						<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Pago Ag. Ad. MX
					</button>
					</a>
	            </div>
	            <br>
	            <div class="row">
					<a href="{{ ($doc_8 !='')? url($doc_8):'#'}}" {{ ($doc_8 !='')?'target="_blank"':''}} class="col-md-3">
	            		<button class="btn btn-float btn-{{ ($doc_8 !='')?'primary':'secondary'}}" {{ ($doc_8 !='')?'':'disabled'}} style="margin-bottom: 3px; width: 100%;">
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Pedimento Aduana MX
						</button>
					</a>
					<a href="{{ ($doc_9 !='')? url($doc_9):'#'}}" {{ ($doc_9 !='')?'target="_blank"':''}} class="col-md-3">
	            		<button class="btn btn-float btn-{{ ($doc_9 !='')?'primary':'secondary'}} " {{ ($doc_9 !='')?'':'disabled'}} style="margin-bottom: 3px; width: 100%;">
						<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>DODA
					</button>
					</a>
	            </div>
	            <br>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header">
	          <h6 class="card-title">Documentación Trámites USA:</h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="row">
	            	<a href="{{ ($doc_11 !='')? url($doc_11):'#'}}" {{ ($doc_11 !='')?'target="_blank"':''}} class="col-md-3">
	            		<button class="btn btn-float btn-{{ ($doc_11 !='')?'primary':'secondary'}} " {{ ($doc_11 !='')?'':'disabled'}} style="margin-bottom: 3px; width: 100%;">
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Verificacion Fracciones USA
						</button>
					</a>
					<a href="{{ ($doc_12 !='')? url($doc_12):'#'}}" {{ ($doc_12 !='')?'target="_blank"':''}} class="col-md-3">
	            		<button class="btn btn-float btn-{{ ($doc_12 !='')?'primary':'secondary'}} " {{ ($doc_12 !='')?'':'disabled'}} style="margin-bottom: 3px; width: 100%;">
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Pre File (Shipment Advice)
						</button>
					</a>
					<a href="{{ ($doc_13 !='')? url($doc_13):'#'}}" {{ ($doc_13 !='')?'target="_blank"':''}} class="col-md-3">
	            		<button class="btn btn-float btn-{{ ($doc_13 !='')?'primary':'secondary'}} " {{ ($doc_13 !='')?'':'disabled'}} style="margin-bottom: 3px; width: 100%;">
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Carta de Aduana
						</button>
					</a>
					<a href="{{ ($doc_14 !='')? url($doc_14):'#'}}" {{ ($doc_14 !='')?'target="_blank"':''}} class="col-md-3">
	            		<button class="btn btn-float btn-{{ ($doc_14 !='')?'primary':'secondary'}}" {{ ($doc_14 !='')?'':'disabled'}} style="margin-bottom: 3px; width: 100%;">
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Bill of Lading USA
						</button>
					</a>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header">
	          <h6 class="card-title">Liberación Aduana:</h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="row">
	            	<div class="form-group col-md-3">
					    {!! Form::label('fecha_aduana_mx', 'Fecha liberación Aduana MX') !!}
					    <input type="date" name="fecha_aduana_mx" id="fecha_aduana_mx" class="form-control" value="{{ $fletes->liberacion_ad_mx}}">
					</div>
					<div class="form-group col-md-3">
					    {!! Form::label('fecha_aduana_us', 'Fecha liberación Aduana US') !!}
					    <input type="date" name="fecha_aduana_us" id="fecha_aduana_us" class="form-control" value="{{ $fletes->liberacion_ad_usa}}">
					</div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header">
	          <h6 class="card-title">Entrega:</h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="row">
	            	<div class="form-group col-md-3">
					    {!! Form::label('fecha_bodega', 'Fecha de entrega en Bodega') !!}
					    <input type="date" name="fecha_bodega" id="fecha_bodega" class="form-control" value="{{ $fletes->entrega_bodega}}">
					</div>
					<a href="{{ ($doc_15 !='')? url($doc_15):'#'}}" {{ ($doc_15 !='')?'target="_blank"':''}} class="col-md-3">
	            		<button class="btn btn-float btn-{{ ($doc_15 !='')?'primary':'secondary'}} " {{ ($doc_15 !='')?'':'disabled'}} style="margin-bottom: 3px;">
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Documento de Entrega (firmado)
						</button>
					</a>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    </form>
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header">
	          <h6 class="card-title">Documentos Anexos:</h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <form class="form-group card-body" id="documentos_anex" enctype="multipart/form-data">
	            	<input type="hidden" name="id_trafico" value="{{ $trafico}}">
	            	{{ csrf_field() }}
	            	<div class="row">
	            		<div class="col-md-3">
	            			<label><span class="red">*</span> Nombre:</label>
		            		<input type="text" name="anex_nombre" id="anex_nombre" class="form-control">
		            	</div>	
		            	<div class="col-md-3">
		            		<label>Descripción:</label>
		            		<input type="textarea" name="anex_descrip" class="form-control">
		            	</div>	
		            	<div class="col-md-3">
		            		<label><span class="red">*</span>Fecha:</label>
		            		<input type="date" name="anex_fecha" id="anex_fecha" class="form-control">
		            	</div>	
		            	<div class="col-md-2">
		            		<label><span class="red">*</span>Archivo:</label>
		            		<input type="file" name="anex_file" id="anex_file" class="form-control">
		            	</div>	
		            	<div class="col-md-1">
		            		<br>
		            		<span class="btn btn-primary" style="margin-top: 7px;" onclick="guarda_anexos({{ $trafico}})"><i class="fa fa-save"></i></span>
		            	</div>	
	            	</div>
	            </form>
	            <div class="row">
	            	<div class="col-md-12" id="documentos_anexo">
	            		@include('traficos.documentos_anexo')
	            	</div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	</div>
</div>
