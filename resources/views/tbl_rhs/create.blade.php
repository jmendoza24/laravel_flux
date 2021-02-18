@extends('layouts.app')
@section('titulo')Nuevo Empleado @endsection
@section('content')
@php($editar=0)

    @include('adminlte-templates::common.errors')
        {!! Form::open(['route' => 'tblRhs.store','enctype'=>'multipart/form-data']) !!}
            @include('tbl_rhs.fields')
        {!! Form::close() !!}
@endsection
