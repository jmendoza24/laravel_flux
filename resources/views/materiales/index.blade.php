@extends('layouts.app')
@section('titulo')Inventario de materiales @endsection
@section('content')
<div class="col-md-12">
    <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('materiales.create') !!}">+ Material</a>
   </h1>
</div>
<br><br><br/>
<div class="col-md-12" style="overflow-x: scroll;">
    @include('materiales.table')
</div>
@endsection

@section('script')
<script type="text/javascript">
	$( document ).ready(function() {
    	$("#materiales-table").DataTable({"paging": false, "lengthChange": false, "sSearch":"Buscar:","bInfo": false});
	});
	
</script>
@endsection

