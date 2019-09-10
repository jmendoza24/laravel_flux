@extends('layouts.app')
@section('titulo')Editar familia @endsection
@section('content')
{!! Form::model($familia, ['route' => ['familias.update', $familia->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
    @include('familias.fields')
{!! Form::close() !!}
@endsection