@extends('layouts.app')
@section('titulo')
    Proveedores 
@endsection
@section('content')
<div class="col-md-12">
    <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('proveedores.create') !!}">+ Proveedor</a>
    </h1>
</div>

@include('flash::message')
<div style="overflow-x: scroll;" class="col-md-12">
  @include('proveedores.table')
</div>
@endsection

