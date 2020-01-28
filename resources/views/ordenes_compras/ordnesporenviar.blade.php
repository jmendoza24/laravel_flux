@extends('layouts.app')

@section('titulo')
    Ordenes de trabajo por enviar
@endsection  

@section('content')
@php($editar = 0)
@php($nuevo = 1)


<div class="row" style="background: #F5F7FA; padding: 10px;">
  @foreach($plantas as $planta)
  <div class="col-xl-3 col-lg-6 col-12">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <div class="media d-flex">
            <div class="align-self-center">
              <i class="icon-pointer danger font-large-2 float-left" style="cursor: pointer;" onclick="obtiene_info_plantas({{ $planta->planta}})"></i>
            </div>
            <div class="media-body text-right">
              <h3>{{$planta->conteo}}</h3>
              <span>{{$planta->nombre}}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
<div class="row">
  <div class="col-md-12" id="tabla_plantas" style="overflow-x: scroll;">
    @include('ordenes_compras.tabla_plantas')
  </div>
</div>

@endsection
