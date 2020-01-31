@extends('layouts.app')
@section('titulo')
    Asignación OT-000{{ $ordenesCompra->id }} | <b>Fecha :</b> {{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}
    @if($ordenesCompra->tipo !=3)
    <br>
    <button class="btn btn-primary pull-right" onclick="finalizar_asignacion({{ $ordenesCompra->id }})">Finalizar asignación</button>
    @endif
@endsection  
@section('content')
@php($editar = 1)
@php($nuevo = 0)
{!! Form::model($ordenesCompra, ['route' => ['ordenesCompras.update', $ordenesCompra->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
    <div class="col-md-12">
   @include('ordenes_compras.detalle')
    </div>
{!! Form::close() !!}
@endsection
