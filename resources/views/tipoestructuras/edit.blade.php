@extends('layouts.app')
@section('titulo')Editar tipo estructura @endsection
@section('content')
{!! Form::model($tipoestructura, ['route' => ['tipoestructuras.update', $tipoestructura->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
      @include('tipoestructuras.fields')
 {!! Form::close() !!}
@endsection