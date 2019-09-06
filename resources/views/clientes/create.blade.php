@extends('layouts.app')
@section('titulo')Nuevo cliente @endsection

@section('content')
@php($editar = 0)
@include('adminlte-templates::common.errors')        
{!! Form::open(['route' => 'clientes.store','class'=>'needs-validation','novalidate']) !!}
    @include('clientes.fields')
{!! Form::close() !!}
@endsection
