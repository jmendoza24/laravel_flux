@extends('layouts.app')
@section('titulo')Ordenes de trabajo @endsection
@section('content')
<div style="overflow-x: scroll;" class="col-md-12">
     @include('ordenes_compras.table')
</div>
@endsection

