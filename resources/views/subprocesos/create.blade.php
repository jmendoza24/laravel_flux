@extends('layouts.app')
@section('titulo')Nuevo subproceso @endsection
@section('content')
{!! Form::open(['route' => 'subprocesos.store','class'=>'needs-validation','novalidate']) !!}
    @include('subprocesos.fields')
{!! Form::close() !!}
@endsection
