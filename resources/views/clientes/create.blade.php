@extends('layouts.app')
@section('titulo')Nuevo cliente @endsection

@section('content')
@include('adminlte-templates::common.errors')        
{!! Form::open(['route' => 'clientes.store']) !!}
    @include('clientes.fields')
{!! Form::close() !!}
@endsection
