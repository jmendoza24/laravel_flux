@extends('layouts.app')
@section('titulo')Editar cliente @endsection

@section('content')
@php($editar = 1)
 {!! Form::model($clientes, ['route' => ['clientes.update', $clientes->id], 'method' => 'patch']) !!}
      @include('clientes.fields')
 {!! Form::close() !!}
@endsection