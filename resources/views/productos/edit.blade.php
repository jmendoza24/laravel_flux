@extends('layouts.app')
@section('titulo')Editar producto @endsection
@section('content')
	{!! Form::model($productos, ['route' => ['productos.update', $productos->id], 'method' => 'patch'], ['class'=>'form form-horizontal']) !!}
	    @include('productos.fields')
	{!! Form::close() !!}          
@endsection