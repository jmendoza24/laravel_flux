@extends('layouts.app')
@section('titulo')Nueva condición @endsection
@section('content')
{!! Form::open(['route' => 'condiciones.store','class'=>'needs-validation','novalidate']) !!}
    @include('condiciones.fields')
{!! Form::close() !!}
@endsection
