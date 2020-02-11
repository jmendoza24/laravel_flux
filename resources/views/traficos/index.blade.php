@extends('layouts.app')
@section('titulo') Tráfico @endsection

@section('content')
    <div class="col-md-12">
        <h1 class="pull-right"> TR -{{$trafico_numero}}
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('traficos.create') !!}">Continuar</a>
        </h1>
    </div>
    <br><br/><br>
    <div class="col-md-12">
    @include('traficos.table')
    </div>
@endsection
