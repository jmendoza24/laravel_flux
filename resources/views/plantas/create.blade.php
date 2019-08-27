@extends('layouts.app')
@section('titulo')Plantas @endsection
@section('content')
    @include('adminlte-templates::common.errors')
        {!! Form::open(['route' => 'plantas.store']) !!}
            @include('plantas.fields')
        {!! Form::close() !!}
@endsection
