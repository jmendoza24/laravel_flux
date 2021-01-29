@extends('layouts.app')

@section('titulo')
    Orden de trabajo OT-000{{ $ordenesCompra->id }} | <b>Fecha :</b> {{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}
@endsection  

@section('content')
@php($editar = 0)
@php($nuevo = 1)


<div class="col-md-12">
  <div id="detalle_cotiza">
    @include('ordenes_compras.detalle')
  </div>
  
    <hr>
  <div class="form-group col-sm-12" style="text-align: right;">
    <a href="{{ route('ordenesCompras.index')}}" class="btn btn-warning mr-1">Regresar</a>
    <a href="{!! route('limpiar') !!}" class="btn btn-dark mr-1">Limpiar formulario</a>

    @if($ordenesCompra->tipo==1)
    <a style="color: white;" onclick="validar_orden({{ $ordenesCompra->id }})" class="btn btn-primary">Aceptar</a>
    @endif
</div>
</div>

@endsection
