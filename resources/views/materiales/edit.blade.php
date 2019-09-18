@extends('layouts.app')
@section('titulo')Editar material @endsection
@section('content')
{!! Form::model($materiales, ['route' => ['materiales.update', $materiales->id], 'method' => 'patch']) !!}
    @include('materiales.fields')
{!! Form::close() !!}
@endsection