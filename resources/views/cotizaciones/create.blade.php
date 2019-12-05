@extends('layouts.app')
@section('titulo') Cotizaciones @endsection
@section('content')
<div class="col-md-12">
    <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('cotizaciones.index') !!}">+ Cotización</a>
    </h1>
</div>
<br><br><br>
<div class="col-md-12" id="table_cotizacion">
   @include('cotizaciones.table')
</div>
@endsection
