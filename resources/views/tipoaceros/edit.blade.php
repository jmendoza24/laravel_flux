@extends('layouts.app')
@section('titulo')Editar tipo de acero @endsection
@section('content')
{!! Form::model($tipoacero, ['route' => ['tipoaceros.update', $tipoacero->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
  @include('tipoaceros.fields')
{!! Form::close() !!}
@endsection