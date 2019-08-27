@extends('layouts.app')
@section('titulo')Editar planta @endsection
@section('content')
  @include('adminlte-templates::common.errors')
   {!! Form::model($planta, ['route' => ['plantas.update', $planta->id], 'method' => 'patch']) !!}
    @include('plantas.fields')
   {!! Form::close() !!}
@endsection  