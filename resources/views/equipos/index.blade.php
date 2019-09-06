@extends('layouts.app')
@section('titulo')
    Equipos 
@endsection
@section('content')
    <div class="col-md-12">
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('equipos.create') !!}">+ Equipo</a>
        </h1>
    </div>
    <div style="overflow-x: scroll;" class="col-md-12">
        @include('equipos.table')
    </div>
@endsection

