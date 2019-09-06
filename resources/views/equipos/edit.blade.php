@extends('layouts.app')
@section('titulo')Editar equipo @endsection
@php($editar = 1)
@section('content')
 {!! Form::model($equipos, ['route' => ['equipos.update', $equipos->id], 'method' => 'patch']) !!}
      @include('equipos.fields')
 {!! Form::close() !!}              
@endsection