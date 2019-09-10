@extends('layouts.app')
@section('titulo')Nuevo departamento @endsection
@section('content')
{!! Form::open(['route' => 'departamentos.store','class'=>'needs-validation','novalidate']) !!}
    @include('departamentos.fields')
{!! Form::close() !!}            
@endsection
