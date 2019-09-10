@extends('layouts.app')
@section('titulo')Nuevo tipo material @endsection
@section('content')
{!! Form::open(['route' => 'tipoMaterials.store','class'=>'needs-validation','novalidate']) !!}
    @include('tipo_materials.fields')
{!! Form::close() !!}
@endsection
