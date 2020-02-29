@extends('layouts.app')
@section('titulo') Trafico IDE: {{ $trafico_numero}} @endsection

@section('content')
    <div class="row">
        <input type="hidden" id="id_cliente" value="{{$cliente_actual->cliente}}">
        <input type="hidden" id="nom_cliente" value="{{$cliente_actual->nombre_corto}}">
        <div class="col-md-9 form-inline">
            <label>Cliente:</label>&nbsp;&nbsp;
            <select class="form-control" id="cliente" onchange="muestra_trafico()">
                <option value="0">Seleccione..</option>
                @foreach($cliente as $cli)
                <option value="{{ $cli->id}}" {{($cli->id==$cliente_actual->cliente)?'selected':''}}>{{ $cli->nombre_corto}}</option>
                @endforeach
            </select>
        </div> 
        <div class="col-md-3 form-group">
            <button class="btn btn-warning  pull-right" onclick="finaliza_trafico({{ $trafico_numero}})">Finalizar</button>
        </div>        
    </div>
    <div class="row">
        <div class="col-md-12" id="traficos_sin">
            @include('traficos.table')
        </div>
    </div>
@endsection

