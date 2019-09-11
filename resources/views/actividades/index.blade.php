@extends('layouts.app')
@section('titulo') Actividades @endsection
@section('content')
<div class="col-md-12">
    <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('actividades.create') !!}">+ Actividad</a>
    </h1>
</div>
<div style="overflow-x: scroll;" class="col-md-12">
    @include('actividades.table')
</div>

@endsection

