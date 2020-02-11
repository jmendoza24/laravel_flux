<div style="width: 100%; overflow-y: scroll; height: 500px; ">
	<div class="row">
		<div class="col-md-6">
			<h5>Tarima</h5>
			<hr>
			<div class="row">
				<div class="form-group col-md-4">
				    {!! Form::label('peso_kg', 'Peso Kg.') !!}
				    <input type="text" name="peso_kg" id="peso_kg" class="form-control">
				</div>
				<div class="form-group col-md-4">
				    {!! Form::label('altura', 'Altura') !!}
				    <input type="text" name="altura" id="altura" class="form-control">
				</div>
				<div class="form-group col-md-4">
				    {!! Form::label('ancho', 'Ancho') !!}
				    <input type="text" name="ancho" id="ancho" class="form-control">
				</div>
				<div class="form-group col-md-4">
				    {!! Form::label('largo', 'Largo') !!}
				    <input type="text" name="largo" id="largo" class="form-control">
				</div>
				<div class="form-group col-md-4">
				    {!! Form::label('peso_tarima', 'Peso tarima') !!}
				    <input type="text" name="peso_tarima" id="peso_tarima" class="form-control">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<h5>Carga de documentos</h5>
			<hr>
			<form class="form-inline">
				<input type="file" name="" class="form-control col-md-3">&nbsp; 
				<select class="form-control">
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
				<input type="button" name="" value="Cargar" class="btn btn-primary">
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<h5>Monitore</h5><hr>
			<button class="btn btn-float btn-outline-primary"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>POD</button>
			<button class="btn btn-float btn-outline-primary"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Packing List</button>
			<button class="btn btn-float btn-outline-primary"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Invoice</button>
		</div>
		<div class="col-md-6">
			<h5>Embarque</h5><hr>
			<button class="btn btn-float btn-outline-primary"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>TR Confirmation</button>
			<button class="btn btn-float btn-outline-primary"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Pickup Delivery Note</button>		
		</div>
	</div>
	<hr>
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
	</div>
	<div class="row">
		<div class="col-md-12">
			<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Notificacion de Embarque</button>
			<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Validacion de Fracciones Mexico</button>
			<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Complemento de Comercio Exterior</button>
			<button class="btn btn-float btn-outline-primary col-md-2" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Factura XML</button>
			<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Factura PDF (Planta México a FLUX USA)</button>
			<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Cotizacion de Ag. Aduanal MX</button>
			<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Comprobante de Pago Ag. Aduanal</button>
			<button class="btn btn-float btn-outline-primary col-md-2" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>DODA</button>
			<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Pedimento Aduana MX</button>
			<button class="btn btn-float btn-outline-primary col-md-2" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>POD Firmado</button>
			<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Verificacion Fracciones USA</button>
			<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Pre File (Shipment Advice)</button>
			<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Carta de Aduana</button>
			<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Bill of Lading USA</button>
		</div>
		<div class="form-group col-md-3">
		    {!! Form::label('fecha_aduana_mx', 'Fecha liberación Aduana MX') !!}
		    <input type="date" name="fecha_aduana_mx" id="fecha_aduana_mx" class="form-control">
		</div>
		<div class="form-group col-md-3">
		    {!! Form::label('fecha_aduana_us', 'Fecha liberación Aduana US') !!}
		    <input type="date" name="fecha_aduana_us" id="fecha_aduana_us" class="form-control">
		</div>
		<div class="form-group col-md-3">
		    {!! Form::label('fecha_bodega', 'Fecha de entrega en Bodega') !!}
		    <input type="date" name="fecha_bodega" id="fecha_bodega" class="form-control">
		</div>
		<button class="btn btn-float btn-outline-primary col-md-3" style="margin-bottom: 3px;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>Documento de Entrega (firmado)</button>			
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
</div>