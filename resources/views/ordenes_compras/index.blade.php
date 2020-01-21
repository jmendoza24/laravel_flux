@extends('layouts.app')
@section('titulo')Ordenes de trabajo @endsection
@section('content')
<div class="col-md-12">
    <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('ordenesCompras.create') !!}">+ OT</a>
    </h1>
</div>
<br><br><br>
<div class="col-md-12">
     @include('ordenes_compras.table')
</div>
@endsection

