@extends('layouts.app')
@section('titulo')Editar condición @endsection
@section('content')
{!! Form::model($condiciones, ['route' => ['condiciones.update', $condiciones->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
    @include('condiciones.fields')
{!! Form::close() !!}
@endsection