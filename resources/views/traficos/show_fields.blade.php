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
	          <h6 class="card-title">Carga de documentos <span class="pull-right" style="cursor: pointer;"><i class="fa fa-info-circle fa-2x" aria-hidden="true"></i></span></h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="card-text">
	              <form class="form-group card-body" id="documentos_seguimiento"enctype="multipart/form-data">
	              	{{ csrf_field() }}
	              	<input type="hidden" name="id_trafico" value="{{ $trafico}}">
	              	<div class="row">
						<div class="form-group col-md-4">
						    <select class="form-control" name="tipo_documento">
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
	          <h6 class="card-title">Tarimas</h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="card-text">
	              	<table class="table table-bordered table-striped small">
						<tr>
							<td>Peso Kg.</td>
							<td>Altura</td>
							<td>Ancho</td>
							<td>Largo</td>
							<td>Peso tarima</td>
							<td></td>
						</tr>
						<tr>
							<td><input type="text" name="peso_kg" id="peso_kg" class="form-control"></td>
							<td><input type="text" name="altura" id="altura" class="form-control"></td>
							<td><input type="text" name="ancho" id="ancho" class="form-control"></td>
							<td><input type="text" name="largo" id="largo" class="form-control"></td>
							<td><input type="text" name="peso_tarima" id="peso_tarima" class="form-control"></td>
							<td>
								<button class="btn btn-primary"><i class="fa fa-save"></i></button>
							</td>
						</tr>
					</table>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header">
	          <h6 class="card-title">Preparación</h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="card-text">
	            	<a href="{{ ($doc_18 !='')? url($doc_18):'#'}}" {{ ($doc_18 !='')?'target="_blank"':''}}>
	            		<button class="btn btn-float btn-{{ ($doc_18 !='')?'primary':'secondary'}} col-md-2" {{ ($doc_18 !='')?'':'disabled'}} >
	            			<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>POD
	            		</button>
	            	</a>
					<a href="{{ ($doc_19 !='')? url($doc_19):'#'}}" {{ ($doc_19 !='')?'target="_blank"':''}}>
						<button class="btn btn-float btn-{{ ($doc_19 !='')?'primary':'secondary'}} col-md-2" {{ ($doc_19 !='')?'':'disabled'}}>
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Packing List
						</button>
					</a>
					<a href="{{ ($doc_20 !='')? url($doc_20):'#'}}" {{ ($doc_20 !='')?'target="_blank"':''}}>
						<button class="btn btn-float btn-{{ ($doc_20 !='')?'primary':'secondary'}} col-md-2" {{ ($doc_20 !='')?'':'disabled'}}>
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Invoice
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
	          <h6 class="card-title">Confirmación de Envío</h6>
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
	          <h6 class="card-title">Información del flete</h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="row">
	            	<div class="row">
						<div class="form-group col-md-3">
						    {!! Form::label('aduanal_mx', 'Agrencia aduanal mx') !!}
						    <input type="text" name="aduanal_mx" id="aduanal_mx" class="form-control">
						</div>
						<div class="form-group col-md-3">
						    {!! Form::label('no_plataforma', 'Plataforma #') !!}
						    <input type="text" name="no_plataforma" id="no_plataforma" class="form-control">
						</div>
						<div class="form-group col-md-3">
						    {!! Form::label('placas', 'Placas') !!}
						    <input type="text" name="placas" id="placas" class="form-control">
						</div>
						<div class="form-group col-md-3">
						    {!! Form::label('pais_or', 'Pais de Origen') !!}
						    <input type="text" name="pais_or" id="pais_or" class="form-control">
						</div>
						<div class="form-group col-md-3">
						    {!! Form::label('amb_largo', 'Largo') !!}
						    <input type="text" name="amb_largo" id="amb_largo" class="form-control">
						</div>
						<div class="form-group col-md-3">
						    {!! Form::label('scac', 'SCAC') !!}
						    <input type="text" name="scac" id="scac" class="form-control">
						</div>
						<div class="form-group col-md-3">
						    {!! Form::label('caat', 'CAAT') !!}
						    <input type="text" name="caat" id="caat" class="form-control">
						</div>
						<div class="form-group col-md-3">
						    {!! Form::label('num_referencia', 'Número de Referencia Expeditors') !!}
						    <input type="text" name="num_referencia" id="num_referencia" class="form-control">
						</div>
						<div class="form-group col-md-3">
						    {!! Form::label('entrada_camion', 'Hora de entrada Camión') !!}
						    <input type="text" name="entrada_camion" id="entrada_camion" class="form-control">
						</div>
						<div class="form-group col-md-3">
						    {!! Form::label('salida_camion', 'Hora de salida Camión') !!}
						    <input type="text" name="salida_camion" id="salida_camion" class="form-control">
						</div>
						<div class="form-group col-md-3">
						    {!! Form::label('fraccion_arra', 'Fracciones Arancelarias USA') !!}
						    <input type="text" name="fraccion_arra" id="fraccion_arra" class="form-control">
						</div>
						<div class="form-group col-md-3">
						    {!! Form::label('fecha_entrega', 'Fecha entrega') !!}
						    <input type="text" name="fecha_entrega" id="fecha_entrega" class="form-control">
						</div>
						<div class="form-group col-md-3">
						    {!! Form::label('tipo_cambio', 'Tipo cambio') !!}
						    <input type="text" name="tipo_cambio" id="tipo_cambio" class="form-control">
						</div>
						<div class="form-group col-md-3">
						    {!! Form::label('fraccion_arra_mx', 'Fraccion Arancelaria MX') !!}
						    <input type="text" name="fraccion_arra_mx" id="fraccion_arra_mx" class="form-control">
						</div>
						<div class="form-group col-md-3">
							<a href="{{ ($doc_3 !='')? url($doc_3):'#'}}" {{ ($doc_3 !='')?'target="_blank"':''}}>
			            		<button class="btn btn-float btn-{{ ($doc_3 !='')?'primary':'secondary'}}" {{ ($doc_3 !='')?'':'disabled'}} style="margin-bottom: 3px;">
			            			<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Notificacion de Embarque
			            		</button>
			            	</a>
						</div>
					</div>
	            	
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header">
	          <h6 class="card-title">Documentación MX Embarque</h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="row">
	            	<a href="{{ ($doc_3 !='')? url($doc_3):'#'}}" {{ ($doc_3 !='')?'target="_blank"':''}} class="col-md-3">
	            		<button class="btn btn-float btn-{{ ($doc_3 !='')?'primary':'secondary'}}" {{ ($doc_3 !='')?'':'disabled'}} style="margin-bottom: 3px;">
	            			<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Validacion de Fracciones Mexico
	            		</button>
	            	</a>
	            </div>
	            <br>
	            <div class="row">
	            	<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Complemento de Comercio Exterior</button>
	            </div>
	            <br>
	            <div class="row">
	            	<a href="{{ ($doc_5 !='')? url($doc_5):'#'}}" {{ ($doc_5 !='')?'target="_blank"':''}} class="col-md-2">
	            		<button class="btn btn-float btn-{{ ($doc_5 !='')?'primary':'secondary'}}" {{ ($doc_5 !='')?'':'disabled'}} style="margin-bottom: 3px;">
	            			<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Factura XML
	            		</button>
	            	</a>
	            	<a href="{{ ($doc_4 !='')? url($doc_4):'#'}}" {{ ($doc_4 !='')?'target="_blank"':''}} class="col-md-4">
						<button class="btn btn-float btn-{{ ($doc_4 !='')?'primary':'secondary'}} " {{ ($doc_4 !='')?'':'disabled'}} style="margin-bottom: 3px;">
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Factura PDF (Planta México a FLUX USA)
						</button>
					</a>
	            </div>
	            <br>
	            <div class="row">
	            	<a href="{{ ($doc_6 !='')? url($doc_6):'#'}}" {{ ($doc_6 !='')?'target="_blank"':''}} class="col-md-3">
	            		<button class="btn btn-float btn-{{ ($doc_6 !='')?'primary':'secondary'}} " {{ ($doc_6 !='')?'':'disabled'}} style="margin-bottom: 3px;">
	            			<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Cotizacion de Ag. Aduanal MX
	            		</button>
	            	</a>
	            	<a href="{{ ($doc_7 !='')? url($doc_7):'#'}}" {{ ($doc_7 !='')?'target="_blank"':''}} class="col-md-3">
	            		<button class="btn btn-float btn-{{ ($doc_7 !='')?'primary':'secondary'}}" {{ ($doc_7 !='')?'':'disabled'}} style="margin-bottom: 3px;">
						<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Comprobante de Pago Ag. Aduanal
					</button>
					</a>
	            </div>
	            <br>
	            <div class="row">
					<a href="{{ ($doc_8 !='')? url($doc_8):'#'}}" {{ ($doc_8 !='')?'target="_blank"':''}} class="col-md-3">
	            		<button class="btn btn-float btn-{{ ($doc_8 !='')?'primary':'secondary'}}" {{ ($doc_8 !='')?'':'disabled'}} style="margin-bottom: 3px;">
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Pedimento Aduana MX
						</button>
					</a>
					<a href="{{ ($doc_9 !='')? url($doc_9):'#'}}" {{ ($doc_9 !='')?'target="_blank"':''}} class="col-md-2">
	            		<button class="btn btn-float btn-{{ ($doc_9 !='')?'primary':'secondary'}} " {{ ($doc_9 !='')?'':'disabled'}} style="margin-bottom: 3px;">
						<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>DODA
					</button>
					</a>
	            </div>
	            <br>
	            <h6 class="card-title">POD</h6>
	            <hr>
	            <div class="row">
	            	<a href="{{ ($doc_10 !='')? url($doc_10):'#'}}" {{ ($doc_10 !='')?'target="_blank"':''}} class="col-md-2">
	            		<button class="btn btn-float btn-{{ ($doc_10 !='')?'primary':'secondary'}}" {{ ($doc_10 !='')?'':'disabled'}} style="margin-bottom: 3px;">
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>POD Firmado
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
	          <h6 class="card-title">Documentación US Embarque</h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="row">
	            	<a href="{{ ($doc_11 !='')? url($doc_11):'#'}}" {{ ($doc_11 !='')?'target="_blank"':''}} class="col-md-3 mr-1">
	            		<button class="btn btn-float btn-{{ ($doc_11 !='')?'primary':'secondary'}} " {{ ($doc_11 !='')?'':'disabled'}} style="margin-bottom: 3px;">
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Verificacion Fracciones USA
						</button>
					</a>
					<a href="{{ ($doc_12 !='')? url($doc_12):'#'}}" {{ ($doc_12 !='')?'target="_blank"':''}} class="col-md-3 mr-1">
	            		<button class="btn btn-float btn-{{ ($doc_12 !='')?'primary':'secondary'}} " {{ ($doc_12 !='')?'':'disabled'}} style="margin-bottom: 3px;">
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Pre File (Shipment Advice)
						</button>
					</a>
					<a href="{{ ($doc_13 !='')? url($doc_13):'#'}}" {{ ($doc_13 !='')?'target="_blank"':''}} class="col-md-2 mr-1">
	            		<button class="btn btn-float btn-{{ ($doc_13 !='')?'primary':'secondary'}} " {{ ($doc_13 !='')?'':'disabled'}} style="margin-bottom: 3px;">
							<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Carta de Aduana
						</button>
					</a>
					<a href="{{ ($doc_14 !='')? url($doc_14):'#'}}" {{ ($doc_14 !='')?'target="_blank"':''}}>
	            		<button class="btn btn-float btn-{{ ($doc_14 !='')?'primary':'secondary'}}" {{ ($doc_14 !='')?'':'disabled'}} style="margin-bottom: 3px;">
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
	          <h6 class="card-title">Liberación</h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="row">
	            	<div class="form-group col-md-3">
					    {!! Form::label('fecha_aduana_mx', 'Fecha liberación Aduana MX') !!}
					    <input type="date" name="fecha_aduana_mx" id="fecha_aduana_mx" class="form-control">
					</div>
					<div class="form-group col-md-3">
					    {!! Form::label('fecha_aduana_us', 'Fecha liberación Aduana US') !!}
					    <input type="date" name="fecha_aduana_us" id="fecha_aduana_us" class="form-control">
					</div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header">
	          <h6 class="card-title">Entrega</h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="row">
	            	<div class="form-group col-md-3">
					    {!! Form::label('fecha_bodega', 'Fecha de entrega en Bodega') !!}
					    <input type="date" name="fecha_bodega" id="fecha_bodega" class="form-control">
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
	</div>
</div>
