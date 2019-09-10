@extends('layouts.app')
@section('titulo')Editar grado @endsection
@section('content')
 {!! Form::model($grado, ['route' => ['grados.update', $grado->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
      @include('grados.fields')
 {!! Form::close() !!}
@endsection