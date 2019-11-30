@extends('layouts.app')
@section('titulo')
Seguimiento OT-000{{ $ordenesCompra->id }} | <b>Fecha :</b> {{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}
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
        <label class="col-md-5 label-control" for="descripcion">Ciente:</label>
        <div class="col-md-7">
          <label id="numproveedor">{{ $ordenesCompra->nombre_corto}}</label>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-5 label-control" for="descripcion">Orden compra cliente:</label>
        <div class="col-md-7">
          <input type="text" id="orden_compra" value="{{$ordenesCompra->orden_compra}}" class="form-control" readonly="" />
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-md-5 label-control" for="descripcion">Contacto compra:</label>
        <div class="col-md-7">
          <label id="clientenombre">{{ $ordenesCompra->nombre_corto}}</label>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-5 label-control" for="descripcion">Email  compra:</label>
        <div class="col-md-7">
          <label id="email">{{$ordenesCompra->correo_compra}}</label> 
        </div>
      </div>
    </div>
  </div>
  <hr/>
    <div class="row">
      <div class="nav-vertical col-md-12">
          <div class="col-md-3">
            <ul class="nav nav-tabs nav-left nav-border-left">
              @foreach($productos as $prod)
              <li class="nav-item">
                <a class="nav-link" onclick="obtiene_seguimiento({{ $prod->id}})" style="width: 100%;" id="baseVerticalLeft2-tab1" data-toggle="tab" aria-controls="tabVerticalLeft{{ $prod->id}}" aria-expanded="true">
                   <i class="fa fa-circle-o-notch" aria-hidden="true"></i>{{ $prod->numero_parte}} - {{ $prod->id}}
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
@endsection
