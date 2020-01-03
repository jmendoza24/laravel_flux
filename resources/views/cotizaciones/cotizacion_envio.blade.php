@if($envio==1)
<html>
    <head>
    	
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <style>

            /** Define the margins of your page **/
            @page {
                margin: 50px 25px;
            }

            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 250px;
            }

            footer {
                position: fixed; 
                bottom: 25px; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
            }

            main{
            	position: fixed; 
                left: 0px; 
                right: 0px;
                top:210px;
            }
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
        	@endif
        	
            <table class="table table-bordered">
				<tr>
					<td style="border-right: 1px solid white; "><img src="{{ asset('app-assets/images/logo/flux.png') }}" style="width: 100px;"/></td>
					<td style="border-right: 1px solid white; "><h4>Quotation</h4></td>
					<td><h6>Quotation ID: <b>00{{ $cotizacion->id }}</b></h6>
						<h6>Date: <b>{{  date("m-d-Y", strtotime($cotizacion->fecha)) }}</b></h6>
						<h6>Created by: {{$cotizacion->name}} </h6></td>
				</tr>
				<tr>
					<td>Client: {{ $cotizacion->nombre_corto }} <br/>
								{{ $cotizacion->direccion }}</td>
					<td>Comprador: {{ $cotizacion->compra_nombre}} <br> {{ $cotizacion->correo_compra}} </td>
					<td>{{ $cotizacion->descripcionic }} - {{ $cotizacion->lugar}}</td>
				</tr>
			</table>
			@if($envio==1)
        </header>

        <footer>
            <table style="width: 100%;" >
				<tr>
					<td style="width: 80%;">
						<h6>Terms:</h6>
						<?php echo nl2br($cotizacion->descinco) ?>
					</td>
				</tr>
			</table>
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            	@endif
            	<div style="overflow-y: auto; max-height: 350px;">
               <table class="table table-bordered">
					<tr>
						<td colspan="3">
							<table class="table" style="">
							    <thead class="" style="background: #518a87; border: 1px solid #518a87; color: white;">
							      <tr>
							        <th>Item</th>
							        <th>Part Description</th>
							        <th>Drawing No</th>
							        <th>Lead time</th> 
							        <th>Quantity</th>
							        <th>Unit Price</th>
							      </tr>
							    </thead>
							    <tbody>
							      @foreach($detalle as $det)
							      <tr>
							        <td>{{ $det->numero_parte }}</td>
							        <td>{{ $det->descripcion}}</td>
							        <td>{{ $det->dibujo_nombre}}</td>
							        <td style="text-align: center;">{{ $det->tiempo_entrega }}</td>
							        <td>{{ $det->cantidad}}</td>
							        <td style="text-align: right;">${{ number_format($det->costo_material,2)}}</td>
							      </tr>
							      @endforeach
							    </tbody>
							  </table>
						</td>
					</tr>
				</table>
			</div>
				@if($envio==1)
        </main>
    </body>
</html>
@endif

@if($envio==0)
<table class="table table-bordered">
	<tr>
		<td style="width: 49%; text-align: justify;">
			<h6>Terms:</h6>
			<?php echo nl2br($cotizacion->descinco) ?>
		</td>
		<td>
			<h6>Inco term:</h6>
			{{ $cotizacion->descripcionic }} - {{ $cotizacion->lugar}}
		</td>
	</tr>
</table>
<hr>
<div class="form-group col-sm-12" style="text-align: right;">
    <a href="{!! route('cotizaciones.historia') !!}" class="btn btn-warning mr-1">Regresar</a>
    <!---<button class="btn btn-primary">Convertir a OCC</button>-->
</div>
@endif