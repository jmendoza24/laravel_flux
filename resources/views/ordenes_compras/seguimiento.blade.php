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
                        @foreach($productos as $producto)
                        <tr>
                          <td> <label  style="width: 90px;">SG-00{{ $producto->id_detalle }}</label></td>
                          <td>{{ $producto->nombre_corto }}</td>
                          <td> <label style="width: 120px;">{{ $producto->numero_parte}} <span class="btn btn-icon btn-info btn-sm" data-toggle="modal" data-backdrop="false" data-target="#primary" ><i class="fa fa-info"></i></span></label></td>
                          <td> {{  date("m-d-Y", strtotime($producto->fecha_entrega)) }}</td>
                          <td>
                            <select class="form-control" style="width: 150px;">
                              <option value="">Seleccione</option>
                              @foreach($plantas as $planta)
                                <option value="{{ $planta->id }}">{{ $planta->nombre }}</option>
                              @endforeach
                            </select>
                          </td>
                          <td style="text-align: center;">
                            <div class="btn-group mx-2" role="group">
                              <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" checked="">
                              &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="agrega_comentarios()" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                          </td>
                          <td style="text-align: center;">
                            <div class="btn-group mx-2" role="group">
                              <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" checked="">
                              &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="agrega_comentarios()" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
                          </div>
                          </td>
                          <td style="text-align: center;">
                            <div class="btn-group mx-2" role="group">
                              <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" checked="">
                              &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="agrega_comentarios()" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
                          </div>
                          </td>
                          <td style="text-align: center;">
                            <button class="btn btn-outline-info"><i class="fa fa-bars" aria-hidden="true"></i></button>
                          </td>
                          <td style="text-align: center;">
                            <div class="btn-group mx-2" role="group">
                              <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" checked="">
                              &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="agrega_comentarios()" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
                          </div>
                          </td>
                          <td style="text-align: center;">
                            <div class="btn-group mx-2" role="group">
                              <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" checked="">
                              &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="agrega_comentarios()" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
                          </div>
                          </td>
                          <td style="text-align: center;">
                            <div class="btn-group mx-2" role="group">
                              <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" checked="">
                              &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="agrega_comentarios()" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
                          </div>
                          </td>
                          <td>
                            <div class="btn-group mx-2" role="group">
                              @foreach($sub_procesos as $suproceso)
                               @if($producto->id_detalle == $suproceso->id_detalle and $suproceso->id_proceso==1 and $producto->id== $suproceso->producto)
                                  <button type="button" onclick="seguimiento_subproceso()" data-toggle="modal" data-backdrop="false" data-target="#primary"  class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                                @endif
                              @endforeach
                            </div>
                          </td>
                          <td>
                            <div class="btn-group mx-2" role="group">
                              @foreach($sub_procesos as $suproceso)
                               @if($producto->id_detalle == $suproceso->id_detalle and $suproceso->id_proceso==2 and $producto->id== $suproceso->producto)
                                  <button type="button" onclick="seguimiento_subproceso()" data-toggle="modal" data-backdrop="false" data-target="#primary"  class="btn btn-icon btn-outline-success"><i class="fa fa-gavel"></i></button>
                                @endif
                              @endforeach
                            </div>
                          </td>
                          <td>
                            <div class="btn-group mx-2" role="group">
                              @foreach($sub_procesos as $suproceso)
                               @if($producto->id_detalle == $suproceso->id_detalle and $suproceso->id_proceso==4 and $producto->id== $suproceso->producto)
                                  <button type="button" data-toggle="modal" data-backdrop="false" data-target="#primary"  class="btn btn-icon btn-outline-success"><i class="fa fa-tint"></i></button>
                                @endif
                              @endforeach
                            </div>
                          </td>
                          <td>
                            <div class="btn-group mx-2" role="group">
                              <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
                            </div>
                          </td>
                          <td>
                            <div class="btn-group mx-2" role="group">
                              <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
                            </div>
                          </td>
                          <td>
                            <div class="btn-group mx-2" role="group">
                              <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
                            </div>
                          </td>
                          <td>
                            <div class="btn-group mx-2" role="group">
                              <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
                            </div>
                          </td>
                          <td>
                            <div class="btn-group mx-2" role="group">
                              <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
                            </div>
                          </td>
                          <td>
                            <div class="btn-group mx-2" role="group">
                              <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
                            </div>
                          </td>
                          <td>
                            <div class="btn-group mx-2" role="group">
                              <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
                            </div>
                          </td>
                          <td>
                            <div class="btn-group mx-2" role="group">
                              <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
                            </div>
                          </td>
                          <td>
                            <div class="btn-group mx-2" role="group">
                              <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
                            </div>
                          </td>
                          <td>
                            <div class="btn-group mx-2" role="group">
                              <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
                            </div>
                          </td>
                          <td>
                            <div class="btn-group mx-2" role="group">
                              <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                              <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
                            </div>
                          </td>
                        </tr>
                        @endforeach
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
