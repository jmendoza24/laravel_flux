@extends('layouts.app')
@section('titulo')Nuevo producto @endsection
@section('content')
@php($editar = 0)
@include('adminlte-templates::common.errors')
{!! Form::open(['route' => 'productos.store','class'=>'needs-validation','novalidate']) !!}
    @include('productos.fields')
{!! Form::close() !!}
@endsection
