@extends('layouts.app')
@section('titulo')Editar subproceso @endsection
@section('content')
{!! Form::model($subprocesos, ['route' => ['subprocesos.update', $subprocesos->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
    @include('subprocesos.fields')
{!! Form::close() !!}               
@endsection