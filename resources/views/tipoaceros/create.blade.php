@extends('layouts.app')
@section('titulo')Nuevo tipo de acero @endsection
@section('content')
{!! Form::open(['route' => 'tipoaceros.store','class'=>'needs-validation','novalidate']) !!}
    @include('tipoaceros.fields')
{!! Form::close() !!}
@endsection
