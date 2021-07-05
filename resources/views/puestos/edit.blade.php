@extends('layouts.app')
@section('titulo')Editar puesto @endsection
@section('content')
{!! Form::model($puestos, ['route' => ['puestos.update', $puestos->id], 'method' => 'patch']) !!}
    @include('puestos.fields')
{!! Form::close() !!}
@endsection
