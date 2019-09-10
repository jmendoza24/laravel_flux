@extends('layouts.app')
@section('titulo')Nuevo proceso @endsection
@section('content')
{!! Form::open(['route' => 'procesos.store','class'=>'needs-validation','novalidate']) !!}
    @include('procesos.fields')
{!! Form::close() !!}
@endsection
