@extends('layouts.app')
@section('titulo')Ordenes Compras @endsection
@section('content')
<div style="overflow-x: scroll;" class="col-md-12">
     @include('ordenes_compras.table')
</div>
@endsection

