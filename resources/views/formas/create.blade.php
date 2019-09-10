@extends('layouts.app')
@section('titulo')Nueva forma @endsection
@section('content')
{!! Form::open(['route' => 'formas.store','class'=>'needs-validation','novalidate']) !!}
    @include('formas.fields')
{!! Form::close() !!}
@endsection
