@extends('layouts.app')
@section('titulo')Ordenes de trabajo @endsection
@section('content')
<div class="col-md-12">
    <h1 class="pull-right">
       <a class="btn btn-success" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('enviados.index')}}" title="Envios a plantas"><i  class="fa fa-map-marker" aria-hidden="true" ></i></a>
       <a class="btn btn-primary" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('ordenesCompras.create') !!}" title="Nueva OT"><i  class="fa fa-plus-circle" aria-hidden="true" ></i></a>
       <a class="btn btn-primary" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('ordenesCompras.seguimiento') !!}" class='btn  btn-float btn-outline-info btn-round' title="Seguimiento"><i  class="fa fa-list-ul" aria-hidden="true"></i></a>                    

    </h1>
</div>
<br><br><br>
<div class="col-md-12">
     @include('ordenes_compras.table')
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
    $('#ordenesCompras-table').DataTable( {
        "paging":   false,
        "ordering": true,
        "info":     true
    } );
} );

</script>
@endsection
