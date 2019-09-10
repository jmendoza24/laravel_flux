@extends('layouts.app')
@section('titulo')Editar forma @endsection
@section('content')
 {!! Form::model($forma, ['route' => ['formas.update', $forma->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
      @include('formas.fields')
 {!! Form::close() !!}
@endsection