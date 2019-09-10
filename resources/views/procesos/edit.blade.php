@extends('layouts.app')
@section('titulo')Editar proceso @endsection
@section('content')
{!! Form::model($procesos, ['route' => ['procesos.update', $procesos->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
  @include('procesos.fields')
{!! Form::close() !!}
@endsection