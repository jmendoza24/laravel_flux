@extends('layouts.app')
@section('titulo')Editar departamento @endsection
@section('content') 
 {!! Form::model($departamentos, ['route' => ['departamentos.update', $departamentos->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
      @include('departamentos.fields')
 {!! Form::close() !!}
@endsection