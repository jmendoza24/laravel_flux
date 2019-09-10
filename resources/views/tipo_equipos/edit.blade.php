@extends('layouts.app')
@section('titulo')Editar tipo equipo @endsection
@section('content')
 {!! Form::model($tipoEquipo, ['route' => ['tipoEquipos.update', $tipoEquipo->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
      @include('tipo_equipos.fields')
 {!! Form::close() !!}
@endsection