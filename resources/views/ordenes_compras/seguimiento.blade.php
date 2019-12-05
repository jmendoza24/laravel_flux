@extends('layouts.app')
@section('titulo')
Seguimiento OT-000{{ $ordenesCompra->id }} | <b>Fecha :</b> {{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}
@endsection
@php($id_detalle = '')
@section('content')
    <div class="row">
                    <table class="table table-striped table-bordered  dataex-colvis-restore">
                      <thead>
                        <tr>
                          <th>IDN</th>
                          <th>Nombre corto</th>
                          <th>#Parte</th>
                          <th>Fecha entrega</th>
                          <th>Planta</th>
                          <th>Lanzamiento</th>
                          <th>Info</th>
                          <th>Preguntas</th>
                          <th>Asig. Mat</th>
                          <th>Pintura</th>
                          <th>Prog. Corte</th>
                          <th>TACM</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>IDN</th>
                          <th>Nombre corto</th>
                          <th>#Parte</th>
                          <th>Fecha entrega</th>
                          <th>Planta</th>
                          <th>Lanzamiento</th>
                          <th>Info</th>
                          <th>Preguntas</th>
                          <th>Asig. Mat</th>
                          <th>Pintura</th>
                          <th>Prog. Corte</th>
                          <th>TACM</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                        </tr>
                        <tr>
                          <th>IDN</th>
                          <th>Nombre corto</th>
                          <th>#Parte</th>
                          <th>Fecha entrega</th>
                          <th>Planta</th>
                          <th>Lanzamiento</th>
                          <th>Info</th>
                          <th>Preguntas</th>
                          <th>Asig. Mat</th>
                          <th>Pintura</th>
                          <th>Prog. Corte</th>
                          <th>TACM</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                        </tr>
                        <tr>
                          <th>IDN</th>
                          <th>Nombre corto</th>
                          <th>#Parte</th>
                          <th>Fecha entrega</th>
                          <th>Planta</th>
                          <th>Lanzamiento</th>
                          <th>Info</th>
                          <th>Preguntas</th>
                          <th>Asig. Mat</th>
                          <th>Pintura</th>
                          <th>Prog. Corte</th>
                          <th>TACM</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                        </tr>
                        
                        <tr>
                          <th>IDN</th>
                          <th>Nombre corto</th>
                          <th>#Parte</th>
                          <th>Fecha entrega</th>
                          <th>Planta</th>
                          <th>Lanzamiento</th>
                          <th>Info</th>
                          <th>Preguntas</th>
                          <th>Asig. Mat</th>
                          <th>Pintura</th>
                          <th>Prog. Corte</th>
                          <th>TACM</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                        </tr>
                        <tr>
                          <th>IDN</th>
                          <th>Nombre corto</th>
                          <th>#Parte</th>
                          <th>Fecha entrega</th>
                          <th>Planta</th>
                          <th>Lanzamiento</th>
                          <th>Info</th>
                          <th>Preguntas</th>
                          <th>Asig. Mat</th>
                          <th>Pintura</th>
                          <th>Prog. Corte</th>
                          <th>TACM</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                        </tr>
                        <tr>
                          <th>IDN</th>
                          <th>Nombre corto</th>
                          <th>#Parte</th>
                          <th>Fecha entrega</th>
                          <th>Planta</th>
                          <th>Lanzamiento</th>
                          <th>Info</th>
                          <th>Preguntas</th>
                          <th>Asig. Mat</th>
                          <th>Pintura</th>
                          <th>Prog. Corte</th>
                          <th>TACM</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                        </tr>
                        <tr>
                          <th>IDN</th>
                          <th>Nombre corto</th>
                          <th>#Parte</th>
                          <th>Fecha entrega</th>
                          <th>Planta</th>
                          <th>Lanzamiento</th>
                          <th>Info</th>
                          <th>Preguntas</th>
                          <th>Asig. Mat</th>
                          <th>Pintura</th>
                          <th>Prog. Corte</th>
                          <th>TACM</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                        </tr>
                        <tr>
                          <th>IDN</th>
                          <th>Nombre corto</th>
                          <th>#Parte</th>
                          <th>Fecha entrega</th>
                          <th>Planta</th>
                          <th>Lanzamiento</th>
                          <th>Info</th>
                          <th>Preguntas</th>
                          <th>Asig. Mat</th>
                          <th>Pintura</th>
                          <th>Prog. Corte</th>
                          <th>TACM</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                        </tr>
                        <tr>
                          <th>IDN</th>
                          <th>Nombre corto</th>
                          <th>#Parte</th>
                          <th>Fecha entrega</th>
                          <th>Planta</th>
                          <th>Lanzamiento</th>
                          <th>Info</th>
                          <th>Preguntas</th>
                          <th>Asig. Mat</th>
                          <th>Pintura</th>
                          <th>Prog. Corte</th>
                          <th>TACM</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                        </tr>
                        <tr>
                          <th>IDN</th>
                          <th>Nombre corto</th>
                          <th>#Parte</th>
                          <th>Fecha entrega</th>
                          <th>Planta</th>
                          <th>Lanzamiento</th>
                          <th>Info</th>
                          <th>Preguntas</th>
                          <th>Asig. Mat</th>
                          <th>Pintura</th>
                          <th>Prog. Corte</th>
                          <th>TACM</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                        </tr>
                        <tr>
                          <th>IDN</th>
                          <th>Nombre corto</th>
                          <th>#Parte</th>
                          <th>Fecha entrega</th>
                          <th>Planta</th>
                          <th>Lanzamiento</th>
                          <th>Info</th>
                          <th>Preguntas</th>
                          <th>Asig. Mat</th>
                          <th>Pintura</th>
                          <th>Prog. Corte</th>
                          <th>TACM</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                        </tr>
                        <tr>
                          <th>IDN</th>
                          <th>Nombre corto</th>
                          <th>#Parte</th>
                          <th>Fecha entrega</th>
                          <th>Planta</th>
                          <th>Lanzamiento</th>
                          <th>Info</th>
                          <th>Preguntas</th>
                          <th>Asig. Mat</th>
                          <th>Pintura</th>
                          <th>Prog. Corte</th>
                          <th>TACM</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                        </tr>
                        <tr>
                          <th>IDN</th>
                          <th>Nombre corto</th>
                          <th>#Parte</th>
                          <th>Fecha entrega</th>
                          <th>Planta</th>
                          <th>Lanzamiento</th>
                          <th>Info</th>
                          <th>Preguntas</th>
                          <th>Asig. Mat</th>
                          <th>Pintura</th>
                          <th>Prog. Corte</th>
                          <th>TACM</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                          <th>Corte</th>
                          <th>Forma</th>
                          <th>Soldado</th>
                          <th>TT</th>
                          <th>Pruebas</th>
                          <th>Pintado</th>
                          <th>Embarque</th>
                        </tr>
                      </tfoot>
                    </table>
     
        
          <!--<div class="col-md-3">
            <ul class="nav nav-tabs nav-left nav-border-left">
              <br><br>
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
        </div>-->
      </div>
  
  </div>
@endsection
