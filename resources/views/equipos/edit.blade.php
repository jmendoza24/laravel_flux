@extends('layouts.app')
@section('titulo')Editar equipo @endsection
@section('content')
 {!! Form::model($equipos, ['route' => ['equipos.update', $equipos->id], 'method' => 'patch']) !!}
      @include('equipos.fields')
 {!! Form::close() !!}              
@endsection