@extends('layouts.app')
@section('titulo')Nuevo producto @endsection
@section('content')

@include('adminlte-templates::common.errors')
{!! Form::open(['route' => 'productos.store']) !!}
    @include('productos.fields')
{!! Form::close() !!}
@endsection
