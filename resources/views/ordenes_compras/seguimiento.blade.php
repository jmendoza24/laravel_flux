@extends('layouts.app')
@section('titulo')
Seguimiento OT-000{{ $ordenesCompra->id }} | <b>Fecha :</b> {{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}
@endsection
@php($id_detalle = '')
@section('content')
    <div class="row">
      <label class="col-md-9"></label>
        <select class="form-control col-md-3" id="bloque_muesta" onchange="muestra_bloque()">
            <option value="all">Ocutlar todos</option>
            <option value="planeacion">Planeación</option>
            <option value="produccion">Producción</option>
            <option value="calidad">Calidad</option>
            <option value="trafico">Trafico</option>
            <option value="factura">Facturación</option>
        </select>
    </div>
    <div class="row" style="">              
      <table class="table table-striped table-bordered complex-headers" id="seguimiento_subproceso">
        <thead>
          <tr>
            <th colspan="5">Información general</th>
            <th colspan="7" class="planeacion">Planeación</th>
            <th colspan="7" class="produccion">Producción</th>
            <th colspan="7" class="calidad">Calidad</th>
            <th class="trafico">Tráfico</th>
            <th class="factura">Facturacion</th>
          </tr>
          <tr>
            <th>IDN</th>
            <th>Nombre corto</th>
            <th>#Parte</th>
            <th>Fecha entrega</th>
            <th>Planta</th>
             {{-- End general --}}
            <th class="planeacion">Lanzamiento</th>
            <th class="planeacion">Info</th>
            <th class="planeacion">Preguntas</th>
            <th class="planeacion">Asig. Mat</th>
            <th class="planeacion">Pintura</th>
            <th class="planeacion">Prog. Corte</th>
            <th class="planeacion">TACM</th>
            {{--  End Planeacion --}}
            <th class="produccion">Corte</th>
            <th class="produccion">Forma</th>
            <th class="produccion">Soldado</th>
            <th class="produccion">TT</th>
            <th class="produccion">Pruebas</th>
            <th class="produccion">Pintado</th>
            <th class="produccion">Empaque</th>
            {{-- end produccion--}}
            <th class="calidad">Corte</th>
            <th class="calidad">Forma</th>
            <th class="calidad">Soldado</th>
            <th class="calidad">TT</th>
            <th class="calidad">Pruebas</th>
            <th class="calidad">Pintado</th>
            <th class="calidad">Empaque</th>
            {{-- end calidad--}}
            <th class="trafico">Trafico</th>
            <th class="factura">Facturacion</th>
          </tr>
        </thead>
        <tbody>
            
        
          @foreach($productos as $producto)
          <tr>
            <td> <label  style="width: 90px;">SG-00{{ $producto->id_detalle }}</label></td>
            <td>{{ $producto->nombre_corto }}</td>
            <td> <label style="width: 120px;">{{ $producto->numero_parte}} <span class="btn btn-icon btn-info btn-sm" data-toggle="modal" data-backdrop="false" data-target="#primary" onclick="informacion_producto({{$producto->id}})" ><i class="fa fa-info"></i></span></label></td>
            <td> {{  date("m-d-Y", strtotime($producto->fecha_entrega)) }}</td>
            <td>
              <select class="form-control" style="width: 150px;">
                <option value="">Seleccione</option>
                @foreach($plantas as $planta)
                  <option value="{{ $planta->id }}">{{ $planta->nombre }}</option>
                @endforeach
              </select>
            </td>

            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" checked="">
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="agrega_comentarios('Lanzamiento')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" checked="">
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="agrega_comentarios('Info')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" checked="">
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="agrega_comentarios('Preguntas')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
            </td>
            <td style="text-align: center;" class="planeacion">
              <button class="btn btn-outline-info"><i class="fa fa-bars" aria-hidden="true"></i></button>
            </td>
            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" checked="">
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="agrega_comentarios('Pintura')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
            </td>
            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" checked="">
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="agrega_comentarios('Prog. Corte')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
            </td>

            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" checked="">
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="agrega_comentarios('TACM')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
            </td>
            <td class="produccion">
              <div class="btn-group mx-2" role="group">
                @foreach($sub_procesos as $suproceso)
                 @if($producto->id_detalle == $suproceso->id_detalle and $suproceso->id_proceso==1 and $producto->id== $suproceso->producto)
                    <button type="button" onclick="seguimiento_subproceso()" data-toggle="modal" data-backdrop="false" data-target="#primary"  class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                  @endif
                @endforeach
              </div>
            </td>
            <td class="produccion">
              <div class="btn-group mx-2" role="group">
                @foreach($sub_procesos as $suproceso)
                 @if($producto->id_detalle == $suproceso->id_detalle and $suproceso->id_proceso==2 and $producto->id== $suproceso->producto)
                    <button type="button" onclick="seguimiento_subproceso()" data-toggle="modal" data-backdrop="false" data-target="#primary"  class="btn btn-icon btn-outline-success"><i class="fa fa-gavel"></i></button>
                  @endif
                @endforeach
              </div>
            </td>
            <td class="produccion">
              <div class="btn-group mx-2" role="group">
                @foreach($sub_procesos as $suproceso)
                 @if($producto->id_detalle == $suproceso->id_detalle and $suproceso->id_proceso==4 and $producto->id== $suproceso->producto)
                    <button type="button" data-toggle="modal" data-backdrop="false" data-target="#primary"  class="btn btn-icon btn-outline-success"><i class="fa fa-tint"></i></button>
                  @endif
                @endforeach
              </div>
            </td>
            <td class="produccion">
              <div class="btn-group mx-2" role="group">
                <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
              </div>
            </td>
            <td class="produccion">
              <div class="btn-group mx-2" role="group">
                <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
              </div>
            </td>
            <td class="produccion">
              <div class="btn-group mx-2" role="group">
                <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
              </div>
            </td>

            <td class="produccion">
              <div class="btn-group mx-2" role="group">
                <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <button type="button" class="btn btn-icon btn-outline-success"><i class="fa fa-thermometer"></i></button>
                <button type="button" class="btn btn-icon btn-outline-warning"><i class="fa fa-gavel"></i></button>
                <button type="button" class="btn btn-icon btn-outline-info"><i class="fa fa-tint"></i></button>
                <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-cog"></i></button>
              </div>
            </td>
            <td class="trafico">Trafico</td>
            <td class="factura">Facturacion</td>
          </tr>
          @endforeach
        </tfoot>
      </table>
      </div>
  
  </div>
@endsection
