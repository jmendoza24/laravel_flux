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
    <br><br><br>
    <div class="col-md-12" style="overflow-x: scroll;">
        @include('equipos.table')
    </div>
@endsection

