@extends('layouts.app')
@section('titulo')Nuevo equipo @endsection
@section('content')
@php($editar = 0)
@include('adminlte-templates::common.errors')
    {!! Form::open(['route' => 'equipos.store','class'=>'needs-validation','novalidate']) !!}
        @include('equipos.fields')
    {!! Form::close() !!}
@endsection
