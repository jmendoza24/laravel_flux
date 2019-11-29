@extends('layouts.app')
@section('titulo')
    Asignación OT-000{{ $ordenesCompra->id }} | <b>Fecha :</b> {{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}
@endsection  
@section('content')
@php($editar = 1)
{!! Form::model($ordenesCompra, ['route' => ['ordenesCompras.update', $ordenesCompra->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
    <div class="col-md-12">
    @include('ordenes_compras.fields')
    </div>
{!! Form::close() !!}
@endsection
