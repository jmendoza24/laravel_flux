@extends('layouts.app')
@section('titulo')Nuevo material @endsection
@section('content')
{!! Form::open(['route' => 'materiales.store']) !!}
    @include('materiales.fields')
{!! Form::close() !!}
@endsection
