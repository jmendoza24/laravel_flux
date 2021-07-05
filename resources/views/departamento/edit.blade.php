@extends('layouts.app')
@section('titulo')Editar departamento @endsection
@section('content') 
 {!! Form::model($departamentos, ['route' => ['departamento.update', $departamentos->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
      @include('departamento.fields')
 {!! Form::close() !!}
@endsection