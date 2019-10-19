@extends('layouts.app')
@section('titulo')Editar ordenes Compra @endsection
@section('content')
{!! Form::model($ordenesCompra, ['route' => ['ordenesCompras.update', $ordenesCompra->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
    <div class="col-md-12">
    @include('ordenes_compras.fields')
    </div>
{!! Form::close() !!}
@endsection
