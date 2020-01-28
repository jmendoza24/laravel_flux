@extends('layouts.app')
@section('titulo')Ordenes de trabajo @endsection
@section('content')
<div class="col-md-12">
    <h1 class="pull-right">
       <a class="btn btn-success" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('enviados.index')}}">OT por enviar</a>
       <a class="btn btn-primary" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('ordenesCompras.create') !!}">+ Nueva OT</a>
    </h1>
</div>
<br><br><br>
<div class="col-md-12">
     @include('ordenes_compras.table')
</div>
@endsection

