@extends('layouts.app')
@section('titulo')Nuevo departamento @endsection
@section('content')
{!! Form::open(['route' => 'departamento.store','class'=>'needs-validation','novalidate']) !!}
    @include('departamento.fields')
{!! Form::close() !!}            
@endsection
