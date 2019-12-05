@extends('layouts.app')
@section('titulo') Condiciones @endsection
@section('content')
<div class="col-md-12">
    <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('condiciones.create') !!}">+ Condición</a>
    </h1>
</div>
<div class="col-md-12">
    @include('condiciones.table')
</div>

@endsection

