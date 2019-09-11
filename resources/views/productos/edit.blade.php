@extends('layouts.app')
@section('titulo')Editar producto @endsection
@php($editar = 1)
@section('content')
	{!! Form::model($productos, ['route' => ['productos.update', $productos->id], 'method' => 'patch', 'class'=>'needs-validation','novalidate']) !!}
	    @include('productos.fields')
	{!! Form::close() !!}          
@endsection