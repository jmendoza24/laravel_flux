@extends('layouts.app')
@section('titulo')Editar actividad @endsection
@section('content')
 {!! Form::model($actividades, ['route' => ['actividades.update', $actividades->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
      @include('actividades.fields')
 {!! Form::close() !!}
@endsection