@extends('layouts.app')
@section('titulo')Nuevo tipo estructura @endsection
@section('content')
{!! Form::open(['route' => 'tipoestructuras.store','class'=>'needs-validation','novalidate']) !!}
    @include('tipoestructuras.fields')
{!! Form::close() !!}
@endsection
