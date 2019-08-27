@extends('layouts.app')
@section('titulo')Editar cliente @endsection

@section('content')
 {!! Form::model($clientes, ['route' => ['clientes.update', $clientes->id], 'method' => 'patch']) !!}
      @include('clientes.fields')
 {!! Form::close() !!}
@endsection