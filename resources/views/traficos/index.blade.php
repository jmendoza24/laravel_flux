@extends('layouts.app')
@section('titulo') Trafico IDE: {{ $trafico_numero}}  @endsection

@section('content')
    <!--<div class="col-md-12">
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('traficos.create') !!}">+ IDE</a>
        </h1>
    </div>
    <br>--->
    <ul class="nav nav-tabs nav-underline no-hover-bg">
	  <li class="nav-item">
	    <a class="nav-link active" id="base-tab31" data-toggle="tab" aria-controls="tab31"
	    href="#tab31" aria-expanded="true">Número de embarque</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="base-tab32" data-toggle="tab" aria-controls="tab32" href="#tab32"
	    aria-expanded="false">Serial</a>
	  </li>
	</ul>
	<div class="tab-content px-1 pt-1">
	  <div role="tabpanel" class="tab-pane active" id="tab31" aria-expanded="true" aria-labelledby="base-tab31">
	    <div class="col-md-12" style="overflow-x: scroll;" id="lista_traficos">
	      @include('traficos.fields')
	    </div>
	  </div>
	  <div class="tab-pane" id="tab32" aria-labelledby="base-tab32">
	    @include('traficos.create')
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