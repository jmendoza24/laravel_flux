@extends('layouts.app')
@section('titulo')Editar cliente @endsection

@section('content')
@php($editar = 1)
 {!! Form::model($clientes, ['route' => ['clientes.update', $clientes->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
      @include('clientes.fields')
 {!! Form::close() !!}
@endsection