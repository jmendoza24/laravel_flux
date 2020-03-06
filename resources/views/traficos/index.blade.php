@extends('layouts.app')
@section('titulo') Tráfico @endsection

@section('content')
    <div class="col-md-12">
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('traficos.create') !!}">+ IDE</a>
        </h1>
    </div>
    <br>
    <ul class="nav nav-tabs nav-underline no-hover-bg">
	  <li class="nav-item">
	    <a class="nav-link active" id="base-tab31" data-toggle="tab" aria-controls="tab31"
	    href="#tab31" aria-expanded="true">IDE</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="base-tab32" data-toggle="tab" aria-controls="tab32" href="#tab32"
	    aria-expanded="false">IDNs</a>
	  </li>
	</ul>
	<div class="tab-content px-1 pt-1">
	  <div role="tabpanel" class="tab-pane active" id="tab31" aria-expanded="true" aria-labelledby="base-tab31">
	    <div class="col-md-12" style="overflow-x: scroll;">
	      @include('traficos.fields')
	    </div>
	  </div>
	  <div class="tab-pane" id="tab32" aria-labelledby="base-tab32">
	    <div class="col-md-12" style="overflow-x: scroll;">
	      <table class="table table-bordered table-striped" id="trafico_idn">
		    <thead class="bg-success">
		        <tr>
		            <th>IDN</th>
		            <th>IDE</th>
		            <th>Cliente</th> 
		            <th>Linea</th>
		            <th>Producto</th>
		            <th>OCC</th>
		            <th>Lugar de entrega</th>
		            <th>Fecha entrega solicitada</th>
		            <th>Fecha entrega producción</th>
		            <th>Planta</th>
		        </tr>
		    </thead> 
		    <tbody>
		        <tr>
		            @foreach($traficos_det as $trafico)
		            <td>{{$trafico->id_detalle}}</label></td>
		            <td>{{$trafico->id_trafico}}</label></td>
		            <td>{{ $trafico->nombre_corto}}</td>
		            <td>{{ $trafico->incremento}}</td>
		            <td>{{ $trafico->numero_parte}}</td>
		            <td>{{ $trafico->orden_compra}}</td>
		            <td>{{ ($trafico->shipping > 0) ?  $trafico->calle . ', '. $trafico->nmunicipio .', '. $trafico->nestado . ', ' . $trafico->npais : ''}}</td>
		            <td>{{ $trafico->fecha_entrega}}</td>  
		            <td>{{ $trafico->fecha_estimado_termino}}</td> 
		            <td>{{ $trafico->planta_name}}</td> 
		        </tr>
		        @endforeach
		    </tbody>
		</table>
	    </div>
	  </div>
	</div>

    
@endsection
 
 @section('script')
  <script type="text/javascript">
    var table = $('#trafico_idn').DataTable({
      "scrollX": true,
      "paging": false,
      "ordering": true,
      "order": [[ 0, "desc" ]]
    });
  </script>
  @endsection