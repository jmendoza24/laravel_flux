<div class="col-md-12" style="border: 10x solid red; max-height: 500px; overflow-y: scroll;" id="tamano_ventana">
	<br>
	<div class="row">
		<div class="col-md-12" style="" >
	      <div class="card" style=" border:2px solid #518a87 !important;">
	        <div class="card-header" style="background: #F5F7FA;">
	          <h6 class="card-title">Carga de documentos <span class="pull-right" style="cursor: pointer;"><i class="fa fa-info-circle fa-2x" aria-hidden="true"></i></span></h6>
	        </div>
	        <div class="card-content collpase show">
	          <div class="card-body">
	            <div class="card-text">
	              <form class="form-group card-body">
	              	<div class="row">
						<div class="form-group col-md-4">
						    <select class="form-control">
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
								<option value="16">Nota Credito</option>
								<option value="17">NCR</option>
							</select>
						</div>
						<div class="form-group col-md-4">
						    <input type="file" name="" class="form-control">
						</div>
						<div class="form-group col-md-2">
						    <input type="button" name="" value="Cargar" class="btn btn-primary pull-right">
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
	            	<button class="btn btn-float btn-outline-primary col-md-2" disabled=""><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>POD</button>
					<button class="btn btn-float btn-outline-primary col-md-2"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Packing List</button>
					<button class="btn btn-float btn-outline-primary col-md-2"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Invoice</button>
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
	            	<button class="btn btn-float btn-outline-primary col-md-3"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>TR Confirmation</button>
					<button class="btn btn-float btn-outline-primary col-md-3"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Pickup Delivery Note</button>		
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
						    <button class="btn btn-float btn-outline-primary" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Notificacion de Embarque</button>
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
	            	<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Validacion de Fracciones Mexico</button>
	            </div>
	            <br>
	            <div class="row">
	            	<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Complemento de Comercio Exterior</button>
	            </div>
	            <br>
	            <div class="row">
	            	<button class="btn btn-float btn-outline-primary col-md-2 mr-1" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Factura XML</button>
					<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Factura PDF (Planta México a FLUX USA)</button>
	            </div>
	            <br>
	            <div class="row">
	            	<button class="btn btn-float btn-outline-primary col-md-3 mr-1" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Cotizacion de Ag. Aduanal MX</button>
					<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Comprobante de Pago Ag. Aduanal</button>
	            </div>
	            <br>
	            <div class="row">
					<button class="btn btn-float btn-outline-primary col-md-3 mr-1" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Pedimento Aduana MX</button>
					<button class="btn btn-float btn-outline-primary col-md-2" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>DODA</button>
	            </div>
	            <br>
	            <h6 class="card-title">POD</h6>
	            <hr>
	            <div class="row">
					<button class="btn btn-float btn-outline-primary col-md-2" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>POD Firmado</button>
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
	            	<button class="btn btn-float btn-outline-primary col-md-3 mr-1" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Verificacion Fracciones USA</button>
					<button class="btn btn-float btn-outline-primary col-md-3 mr-1" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Pre File (Shipment Advice)</button>
					<button class="btn btn-float btn-outline-primary col-md-2 mr-1" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Carta de Aduana</button>
					<button class="btn btn-float btn-outline-primary col-md-2" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Bill of Lading USA</button>
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
					<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Documento de Entrega (firmado)</button>			
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	</div>
</div>

	
<!--

	<div class="row">
		<div class="col-md-12">
			
			
			
			
			
			
			
			
		</div>
		
		
	</div>
	<hr>
	<div class="row">
		<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Factura Flux US - Cliente</button>
		<div class="form-group col-md-3">
		    {!! Form::label('fecha_pago', 'Fecha de pago') !!}
		    <input type="date" name="fecha_pago" id="fecha_pago" class="form-control">
		</div>
		<div class="form-group col-md-3">
		    {!! Form::label('pago_monto', 'Pago monto') !!}
		    <input type="text" name="pago_monto" id="pago_monto" class="form-control">
		</div>
		<div class="form-group col-md-3">
		    {!! Form::label('desc_monto', 'Descuento aplicado monto calculado') !!}
		    <input type="text" name="desc_monto" id="desc_monto" class="form-control">
		</div>
		<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Nota credito</button>
		<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>NCR</button>
		<div class="form-group col-md-3">
		    {!! Form::label('registra_idn', 'Registrar IDN') !!}
		    <input type="text" name="registra_idn" id="registra_idn" class="form-control">
		</div>
		<div class="form-group col-md-3">
		    {!! Form::label('accion_correctiva', 'Accion correctiva') !!}
		    <input type="text" name="accion_correctiva" id="accion_correctiva" class="form-control">
		</div>
		<div class="form-group col-md-3">
		    {!! Form::label('accion_auditoria', 'Auditoría Acción Correctiva') !!}
		    <input type="text" name="accion_auditoria" id="accion_auditoria" class="form-control">
		</div>
		<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Acción Correctiva MEMO</button>
	</div>
--->