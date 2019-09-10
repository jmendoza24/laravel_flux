@extends('layouts.app')
@section('titulo')Nuevo proveedor @endsection
@section('content')
    
@include('adminlte-templates::common.errors')
    {!! Form::open(['route' => 'proveedores.store','class'=>'needs-validation','novalidate']) !!}
        @include('proveedores.fields')
    {!! Form::close() !!}
@endsection
