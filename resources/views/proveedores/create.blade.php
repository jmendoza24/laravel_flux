@extends('layouts.app')
@section('titulo')Nuevo proveedor @endsection
@section('content')
    
@include('adminlte-templates::common.errors')
    {!! Form::open(['route' => 'proveedores.store']) !!}
        @include('proveedores.fields')
    {!! Form::close() !!}
@endsection
