@extends('layouts.app')
@section('titulo')Nuevo puesto @endsection
@section('content')
{!! Form::open(['route' => 'puestos.store']) !!}
    @include('puestos.fields')
{!! Form::close() !!}
@endsection
