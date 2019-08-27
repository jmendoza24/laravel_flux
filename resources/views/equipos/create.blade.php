@extends('layouts.app')
@section('titulo')Nuevo equipo @endsection
@section('content')
@include('adminlte-templates::common.errors')
    {!! Form::open(['route' => 'equipos.store']) !!}
        @include('equipos.fields')
    {!! Form::close() !!}
@endsection
