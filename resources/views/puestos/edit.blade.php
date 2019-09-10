@extends('layouts.app')
@section('titulo')Editar puesto @endsection
@section('content')
 {!! Form::model($puesto, ['route' => ['puestos.update', $puesto->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
      @include('puestos.fields')
 {!! Form::close() !!}               
@endsection