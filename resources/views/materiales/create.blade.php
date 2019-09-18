@extends('layouts.app')
@section('titulo')Nuevo material @endsection
@section('content')
{!! Form::open(['route' => 'materiales.store','class'=>'needs-validation','novalidate']) !!}
    @include('materiales.fields')
{!! Form::close() !!}
@endsection
