@extends('layouts.app')
@section('titulo')Editar proveedor @endsection
@section('content')  
   {!! Form::model($proveedores, ['route' => ['proveedores.update', $proveedores->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
        @include('proveedores.fields')
   {!! Form::close() !!}
@endsection