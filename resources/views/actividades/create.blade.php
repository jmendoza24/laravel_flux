@extends('layouts.app')
@section('titulo')Nueva actividad @endsection
@section('content')

{!! Form::open(['route' => 'actividades.store','class'=>'needs-validation','novalidate']) !!}
    @include('actividades.fields')
{!! Form::close() !!}
@endsection
