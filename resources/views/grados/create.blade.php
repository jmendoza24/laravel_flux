@extends('layouts.app')
@section('titulo')Nuevo grado @endsection
@section('content')
{!! Form::open(['route' => 'grados.store','class'=>'needs-validation','novalidate']) !!}
    @include('grados.fields')
{!! Form::close() !!}
@endsection
