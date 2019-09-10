@extends('layouts.app')
@section('titulo')Nuevo tipo equipo @endsection
@section('content')
{!! Form::open(['route' => 'tipoEquipos.store','class'=>'needs-validation','novalidate']) !!}
    @include('tipo_equipos.fields')
{!! Form::close() !!}
@endsection
