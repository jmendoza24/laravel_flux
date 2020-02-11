@extends('layouts.app')
@section('titulo') Trafico @endsection

@section('content')
    <div class="row">
        <div class="col-md-9 form-inline">
            <label>Cliente:</label>&nbsp;&nbsp;
            <select class="form-control" id="cliente" onchange="muestra_trafico()">
                <option value="0">Seleccione..</option>
                @foreach($cliente as $cli)
                <option value="{{ $cli->id}}">{{ $cli->nombre_corto}}</option>
                @endforeach
            </select>
        </div> 
        <div class="col-md-3 form-group">
            <button class="btn btn-warning  pull-right">Finalizar</button>
        </div>        
    </div>
    <div class="row">
        <div class="col-md-12" id="traficos_sin">
            @include('traficos.table')
        </div>
    </div>
@endsection
