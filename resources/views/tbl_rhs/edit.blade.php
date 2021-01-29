@extends('layouts.app')
@section('titulo')Editar Empleado @endsection
@section('content')
@php($editar=1)
  @include('adminlte-templates::common.errors')
  {!! Form::model($tblRh, ['route' => ['tblRhs.update', $tblRh->id], 'method' => 'patch']) !!}
    @include('tbl_rhs.fields')
   {!! Form::close() !!}
@endsection  