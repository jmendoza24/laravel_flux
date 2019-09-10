@extends('layouts.app')
@section('titulo')Nuevo Income @endsection
@section('content')
{!! Form::open(['route' => 'incomeTerms.store','class'=>'needs-validation','novalidate']) !!}
    @include('income_terms.fields')
{!! Form::close() !!}
@endsection
