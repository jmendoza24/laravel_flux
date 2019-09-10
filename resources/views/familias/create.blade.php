@extends('layouts.app')
@section('titulo')Nueva familia @endsection
@section('content')
{!! Form::open(['route' => 'familias.store','class'=>'needs-validation','novalidate']) !!}
    @include('familias.fields')
{!! Form::close() !!}
@endsection
