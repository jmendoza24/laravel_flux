@extends('layouts.app')
@section('titulo')
Orden de trabajo OT-000{{ $ordenesCompra->id }} | <b>Fecha :</b> {{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}
@endsection
@php($id_detalle = '')
@section('content')
 <div class="row">
    <div class="col-md-12">
      <h5>Datos del cliente</h5>
      <hr>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-md-5 label-control" for="descripcion">Nombre:</label>
        <div class="col-md-7">
          <label id="numproveedor">{{ $ordenesCompra->id_proveedor}}</label>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-5 label-control" for="descripcion">Número proveedor:</label>
        <div class="col-md-7">
          <label id="clientenombre">{{ $ordenesCompra->nombre_corto}}</label>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-5 label-control" for="descripcion">Orden compra cliente:</label>
        <div class="col-md-7">
          <label>{{$ordenesCompra->orden_compra}}</label>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-md-5 label-control" for="descripcion">Email de compra:</label>
        <div class="col-md-7">
          <label id="email">{{$ordenesCompra->correo_compra}}</label> 
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-5 label-control" for="descripcion">Teléfono de compra:</label>
        <div class="col-md-7">
          <label id="telefono">{{$ordenesCompra->compra_telefono}}</label>
        </div>
      </div>
    </div>
  </div>
  <hr/>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-vertical col-md-12">
                <div class="col-md-3">
                  <ul class="nav nav-tabs nav-left nav-border-left">
                    @foreach($productos as $prod)
                    <li class="nav-item">
                      <a class="nav-link" onclick="obtiene_seguimiento({{ $prod->id}})" style="width: 100%;" id="baseVerticalLeft2-tab1" data-toggle="tab" aria-controls="tabVerticalLeft{{ $prod->id}}" aria-expanded="true">
                         <i class="fa fa-circle-o-notch" aria-hidden="true"></i>{{ $prod->numero_parte}} - {{ $prod->incremento}}
                      </a>
                    </li>
                    @endforeach
                  </ul>
                </div>
              <div class="col-md-9" id="informe_seguimiento" style="border: 0px solid red; float: right;">
                    @include('ordenes_compras.informe_seguimiento')
              </div>
            </div>
        </div>
    </div>
@endsection
