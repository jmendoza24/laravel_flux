@extends('layouts.app')
@section('titulo')Editar tipo material @endsection
@section('content')
 {!! Form::model($tipoMaterial, ['route' => ['tipoMaterials.update', $tipoMaterial->id], 'method' => 'patch','class'=>'needs-validation','novalidate']) !!}
      @include('tipo_materials.fields')
 {!! Form::close() !!}
@endsection