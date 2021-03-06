@extends('layouts.app')
@section('titulo')
Seguimiento ordenes de trabajo
@endsection
@php($id_detalle = '')
@section('content')
    <div class="row">
      <label class="col-md-9"></label>
        <select class="form-control col-md-3" id="bloque_muesta" onchange="muestra_bloque()">
            <option>Seleccione...</option>
            <option value="show_estatus"  class="mostr-estatus">Estatus</option>
            <!--<option value="all">Ocultar todos</option>
            <option value="hide_estatus" class="oct-estatus">Ocultar estatus</option>
            <option value="shohwall">Mostrar todos</option>--->
            <option value="planeacion">Planeación</option>
            <option value="produccion">Producción</option>
            <option value="trafico">Tráfico</option>
            <option value="factura">Facturación</option>
        </select>
    </div>
    <div class="row" style="">              
      <table class="table  table-bordered order-column" id="seguimiento_subproceso">
        <thead>
          <tr>
            <th colspan="6">Información general</th>
            <th colspan="5">Estatus</th>
            <th colspan="7" class="planeacion">Planeación</th>
            <th colspan="8" class="produccion">Producción</th>
            <th colspan="7" class="calidad">Calidad</th>
            <th class="trafico">Tráfico</th>
            <th class="factura">Facturación</th>
          </tr>
          <tr class="bg-success">
            <th>IDN</th>
            <th>#Pieza</th>
            <th>Fecha entrega</th>
            <th>Nombre corto</th>
            <th>OT</th>
            <th>Planta</th>
             {{-- End general --}}
            <th>Planeación</th>
            <th>Producción</th>
            <th>Calidad</th>
            <th>Tráfico</th>
            <th>Facturación</th>
            {{-- End estaus --}}
            <th class="planeacion">Lanzamiento</th>
            <th class="planeacion">Info</th>
            <th class="planeacion">Preguntas</th>
            <th class="planeacion">Asig. Mat</th>
            <th class="planeacion">Pintura</th>
            <th class="planeacion">Prog. Corte</th>
            <th class="planeacion">TACM</th>
            {{--  End Planeacion --}}
            <th>Fecha producción</th> 
            <th class="produccion">Corte</th>
            <th class="produccion">Forma</th>
            <th class="produccion">Soldado</th>
            <th class="produccion">TT</th> 
            <th class="produccion">Pruebas NDE</th>
            <th class="produccion">Pintado</th>
            <th class="produccion">Empaque</th>
            {{-- end produccion--}}
            <th class="calidad">Corte</th>
            <th class="calidad">Forma</th>
            <th class="calidad">Soldado</th>
            <th class="calidad">TT</th>
            <th class="calidad">Pruebas NDE</th>
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
            <td style="z-index: 1000;">
             <label  style="width: 90px;">FM{{ str_pad($producto->id_detalle,6,"0",STR_PAD_LEFT) }}</label>
            </td>
            <td style="z-index: 1000;"> <label style="width: 120px;">{{ $producto->numero_parte}} <span class="btn btn-icon btn-info btn-sm" style="background-color: #518a87 !important" data-toggle="modal" data-backdrop="false" data-target="#primary" onclick="informacion_producto({{$producto->idproducto}},{{$producto->id_detalle}})" ><i class="fa fa-info"></i></span></label></td>
            <td style="z-index: 1000;"> {{  date("m-d-Y", strtotime($producto->fecha_entrega)) }}</td>
            <td>{{ $producto->nombre_corto }}</td>
            <td>{{ $producto->orden_compra}}</td>
            <td>
              <select class="form-control" style="width: 150px;" id="id_planta{{ $producto->id_detalle}}" disabled="">
                <option value="">Seleccione</option>
                @foreach($plantas as $planta)
                  <option value="{{ $planta->id }}" {{($producto->idplanta==$planta->id)?'selected':''}}>{{ $planta->nombre }}</option>
                @endforeach
              </select>
            </td>
            <td><span class="badge badge-primary badge-outlined">Estatus...</span></td>
            <td><span class="badge badge-primary badge-outlined">Estatus...</span></td>
            <td><span class="badge badge-primary badge-outlined">Estatus...</span></td>
            <td><span class="badge badge-primary badge-outlined">Estatus...</span></td>
            <td><span class="badge badge-primary badge-outlined">Estatus...</span></td>
            {{-- FIn estatus --}}
            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group" style="">
                <!--<span class="badge badge-{{ ($producto->lanzamiento != '')?'success':'warning' }} badge-outlined">{{ ($producto->st_lanzamiento==1)?'SI':'NO' }}</span>--->
                <input type="checkbox" class="switch" {{ ($producto->st_lanzamiento==1)?'checked':'' }} data-on-label="&nbsp;Si&nbsp;" id="st_lanzamiento{{$producto->id_detalle}}" data-group-cls="btn-group-sm" onchange="guarda_detalles_pro(2,{{ $producto->id_detalle }},'st_lanzamiento',{{$producto->id_orden}})" >
                &nbsp;<span id="span{{$producto->id_detalle}}_2" class=""   onclick="agrega_comentarios(2,{{$producto->id_detalle}},{{$producto->id_orden}})" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group">
                <!--<span class="badge badge-{{ ($producto->informacion != '')?'success':'warning' }} badge-outlined">{{ ($producto->st_informacion==1)?'SI':'NO' }}</span>--->
                <input type="checkbox" class="switch" {{ ($producto->st_informacion==1)?'checked':'' }} data-on-label="&nbsp;Si&nbsp;" id="st_informacion{{$producto->id_detalle}}" data-group-cls="btn-group-sm" onchange="guarda_detalles_pro(3,{{ $producto->id_detalle }},'st_informacion',{{$producto->id_orden}})" >
                &nbsp;<span id="span{{$producto->id_detalle}}_3" class=""  onclick="agrega_comentarios(3,{{$producto->id_detalle}},{{$producto->id_orden}})" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group">
                <!--<span class="badge badge-{{ ($producto->pregunta !='')?'success':'warning' }} badge-outlined">{{ ($producto->st_pregunta==1)?'SI':'NO' }}</span>--->
                <input type="checkbox" class="switch" {{ ($producto->st_pregunta==1)?'checked':'' }} data-on-label="&nbsp;Si&nbsp;" id="st_pregunta{{$producto->id_detalle}}" data-group-cls="btn-group-sm" onchange="guarda_detalles_pro(4,{{ $producto->id_detalle }},'st_pregunta',{{$producto->id_orden}})" >
                &nbsp;<span id="span{{$producto->id_detalle}}_4" class="" onclick="agrega_comentarios(4,{{$producto->id_detalle}},{{$producto->id_orden}})" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
            </td>
            <td style="text-align: center;" class="planeacion">
              <button class="btn btn-outline-info" data-toggle="modal" data-backdrop="false" data-target="#primary" onclick="configura_metariales({{ $producto->id_detalle}},{{$producto->id_orden}})"><i class="fa fa-cubes" aria-hidden="true"></i></button>
            </td>
            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group">
                <!--<span class="badge badge-{{ ($producto->pintura != '')?'success':'warning' }} badge-outlined">{{ ($producto->st_pintura==1)?'SI':'NO' }}</span>-->
                <input type="checkbox" class="switch" {{ ($producto->st_pintura==1)?'checked':'' }} data-on-label="&nbsp;Si&nbsp;" id="st_pintura{{$producto->id_detalle}}" data-group-cls="btn-group-sm" onchange="guarda_detalles_pro(5,{{ $producto->id_detalle }},'st_pintura',{{$producto->id_orden}})" >
                &nbsp;<span id="span{{$producto->id_detalle}}_5" class=""  onclick="agrega_comentarios(5,{{$producto->id_detalle}},{{$producto->id_orden}})" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
            </td>
            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group">
                <!--<span class="badge badge-{{ ($producto->prog_corte != '')?'success':'warning' }} badge-outlined">{{ ($producto->st_prog_corte==1)?'SI':'NO' }}</span>--->
                <input type="checkbox" class="switch" {{ ($producto->st_prog_corte==1)?'checked':'' }} data-on-label="&nbsp;Si&nbsp;" id="st_prog_corte{{$producto->id_detalle}}" data-group-cls="btn-group-sm" onchange="guarda_detalles_pro(6,{{ $producto->id_detalle }},'st_prog_corte',{{$producto->id_orden}})" >
                &nbsp;<span id="span{{$producto->id_detalle}}_6" class=""   onclick="agrega_comentarios(6,{{$producto->id_detalle}},{{$producto->id_orden}})" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>

            <td style="text-align: center;" class="planeacion">
              <div class="btn-group mx-2" role="group">
                <!--<span class="badge badge-{{ ($producto->tacm != '')?'success':'warning' }} badge-outlined">{{ ($producto->st_tacm==1)?'SI':'NO' }}</span>--->
                <input type="checkbox" class="switch" {{ ($producto->st_tacm==1)?'checked':'' }} data-on-label="&nbsp;Si&nbsp;" id="st_tacm{{$producto->id_detalle}}" data-group-cls="btn-group-sm" onchange="guarda_detalles_pro(7,{{ $producto->id_detalle }},'st_tacm',{{$producto->id_orden}})" >
                &nbsp;<span id="span{{$producto->id_detalle}}_7" class=""  onclick="agrega_comentarios(7,{{$producto->id_detalle}},{{$producto->id_orden}})" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
            </td>
            <td class="produccion">
              <input type="date" id="fecha_termino_seg" value="{{ $producto->fecha_estimado_termino}}" class="form-control" onchange="guarda_planeacion(8,{{ $producto->id_detalle}},{{$producto->id_orden}});"> 
            </td>
            <td class="produccion">
              <div class="btn-group mx-2" role="group">
                @php($color_p = 'secondary')
                @foreach($seg_produccion as $s_prod)
                @if($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 1 && $s_prod->conteo==0)
                  @php($color_p = 'primary')
                @elseif($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 1 && $s_prod->conteo > 0)
                @php($color_p = 'secondary')
                @endif
                @endforeach
                <span class="badge badge-{{$color_p}} badge-outlined">P</span>&nbsp;
                @php($color = 'secondary')
                @foreach($calida_seg as $calidad)
                  @if($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==1 && $calidad->estatus==0)
                  @php($color = 'secondary')
                  @elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==1 && $calidad->estatus==1)
                    @php($color = 'danger')
                  @elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==1 && $calidad->estatus==2)
                  @php($color = 'primary')
                  @endif
                @endforeach
                <span class="badge badge-{{ $color}} badge-outlined">C</span>
                &nbsp;<span  onclick="seguimiento_subproceso(1,{{$producto->idproducto}},{{ $producto->id_detalle }},'{{ str_pad($producto->id_detalle,6,"0",STR_PAD_LEFT) }}')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="produccion">
              @php($color2 = 'secondary')
              @foreach($calida_seg as $calidad)
                  @if($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==2 && $calidad->estatus==0)
                  @php($color2 = 'secondary')
                  @elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==2 && $calidad->estatus==1)
                    @php($color2 = 'danger' )
                  @elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==2 && $calidad->estatus==2)
                  @php($color2 = 'primary')
                  @endif
                @endforeach

              <div class="btn-group mx-2" role="group">
                @php($color_p = 'secondary')
                @foreach($seg_produccion as $s_prod)
                @if($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 2 && $s_prod->conteo==0)
                  @php($color_p = 'primary')
                @elseif($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 2 && $s_prod->conteo > 0)
                @php($color_p = 'secondary')
                @endif
                @endforeach
                <span class="badge badge-{{$color_p}} badge-outlined">P</span>&nbsp;
                <span class="badge badge-{{ $color2}} badge-outlined">C</span>
                &nbsp;<span  onclick="seguimiento_subproceso(2,{{$producto->idproducto}},{{ $producto->id_detalle }},'{{ str_pad($producto->id_detalle,6,"0",STR_PAD_LEFT) }}')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="produccion">
              @php($color3 = 'secondary')
              @foreach($calida_seg as $calidad)
                  @if($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==3 && $calidad->estatus==0)
                    @php($color3 = 'secondary')
                  @elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==3 && $calidad->estatus==1)
                    @php($color3 = 'danger' )
                  @elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==3 && $calidad->estatus==2)
                    @php($color3 = 'primary')
                  @endif
                @endforeach
              <div class="btn-group mx-2" role="group">
                @php($color_p = 'secondary')
                @foreach($seg_produccion as $s_prod)
                @if($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 3 && $s_prod->conteo==0)
                  @php($color_p = 'primary')
                @elseif($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 3 && $s_prod->conteo > 0)
                @php($color_p = 'secondary')
                @endif
                @endforeach
                <span class="badge badge-{{$color_p}} badge-outlined">P</span>&nbsp;
                <span class="badge badge-{{ $color3}} badge-outlined">C</span>
                &nbsp;<span  onclick="seguimiento_subproceso(3,{{$producto->idproducto}},{{ $producto->id_detalle }},'{{ str_pad($producto->id_detalle,6,"0",STR_PAD_LEFT) }}')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="produccion">
              @php($color4 = 'secondary')
              @foreach($calida_seg as $calidad)
                  @if($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==4 && $calidad->estatus==0)
                    @php($color4 = 'secondary')
                  @elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==4 && $calidad->estatus==1)
                    @php($color4 = 'danger' )
                  @elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==4 && $calidad->estatus==2)
                    @php($color4 = 'primary')
                  @endif
                @endforeach
              <div class="btn-group mx-2" role="group">
                @php($color_p = 'secondary')
                @foreach($seg_produccion as $s_prod)
                @if($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 4 && $s_prod->conteo==0)
                  @php($color_p = 'primary')
                @elseif($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 4 && $s_prod->conteo > 0)
                @php($color_p = 'secondary')
                @endif
                @endforeach
                <span class="badge badge-{{$color_p}} badge-outlined">P</span>&nbsp;
                <span class="badge badge-{{ $color4}} badge-outlined">C</span>
                &nbsp;<span  onclick="seguimiento_subproceso(4,{{$producto->idproducto}},{{ $producto->id_detalle }},'{{ str_pad($producto->id_detalle,6,"0",STR_PAD_LEFT) }}')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="produccion">
              @php($color5 = 'secondary')
              @foreach($calida_seg as $calidad)
                  @if($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==5 && $calidad->estatus==0)
                    @php($color5 = 'secondary')
                  @elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==5 && $calidad->estatus==1)
                    @php($color5 = 'danger' )
                  @elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==5 && $calidad->estatus==2)
                    @php($color5 = 'primary')
                  @endif
                @endforeach
              <div class="btn-group mx-2" role="group">
                @php($color_p = 'secondary')
                @foreach($seg_produccion as $s_prod)
                @if($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 5 && $s_prod->conteo==0)
                  @php($color_p = 'primary')
                @elseif($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 5 && $s_prod->conteo > 0)
                @php($color_p = 'secondary')
                @endif
                @endforeach
                <span class="badge badge-{{$color_p}} badge-outlined">P</span>&nbsp;
                <span class="badge badge-{{ $color5}} badge-outlined">C</span>
                &nbsp;<span  onclick="seguimiento_subproceso(5,{{$producto->idproducto}},{{ $producto->id_detalle }},'{{ str_pad($producto->id_detalle,6,"0",STR_PAD_LEFT) }}')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="produccion">
              @php($color6 = 'secondary')
              @foreach($calida_seg as $calidad)
                  @if($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==6 && $calidad->estatus==0)
                  @php($color6 = 'secondary')
                  @elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==6 && $calidad->estatus==1)
                    @php($color6 = 'danger' )

                  @elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==6 && $calidad->estatus==2)
                  @php($color6 = 'primary')
                  @endif
                @endforeach
              <div class="btn-group mx-2" role="group">
                @php($color_p = 'secondary')
                @foreach($seg_produccion as $s_prod)
                @if($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 6 && $s_prod->conteo==0)
                  @php($color_p = 'primary')
                @elseif($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 6 && $s_prod->conteo > 0)
                @php($color_p = 'secondary')
                @endif
                @endforeach
                <span class="badge badge-{{$color_p}} badge-outlined">P</span>&nbsp;
                <span class="badge badge-{{ $color6}} badge-outlined">C</span>
                &nbsp;<span  onclick="seguimiento_subproceso(6,{{$producto->idproducto}},{{ $producto->id_detalle }},'{{ str_pad($producto->id_detalle,6,"0",STR_PAD_LEFT) }}')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>

            <td class="produccion">
              @php($color7 = 'secondary')
              @foreach($calida_seg as $calidad)
                  @if($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==7 && $calidad->estatus==0)
                  @php($color7 = 'secondary')
                  @elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==7 && $calidad->estatus==1)
                    @php($color7 = 'danger' )
                  @elseif($calidad->id_detalle==$producto->id_detalle && $calidad->id_proceso ==7 && $calidad->estatus==2)
                  @php($color7 = 'primary')
                  @endif
                @endforeach
              <div class="btn-group mx-2" role="group">
                @php($color_p = 'secondary')
                @foreach($seg_produccion as $s_prod)
                @if($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 7 && $s_prod->conteo==0)
                  @php($color_p = 'primary')
                @elseif($s_prod->id_detalle == $producto->id_detalle && $s_prod->id_proceso == 7 && $s_prod->conteo > 0)
                @php($color_p = 'secondary')
                @endif
                @endforeach
                <span class="badge badge-{{$color_p}} badge-outlined">P</span>&nbsp;
                <span class="badge badge-{{ $color7}} badge-outlined">C</span>
                &nbsp;<span  onclick="seguimiento_subproceso(7,{{$producto->idproducto}},{{ $producto->id_detalle }},'{{ str_pad($producto->id_detalle,6,"0",STR_PAD_LEFT) }}')" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" >
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="seguimiento_calidad(1,{{$producto->idproducto}},{{ $producto->id_detalle }})" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" >
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="seguimiento_calidad(2,{{$producto->idproducto}},{{ $producto->id_detalle }})" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" >
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="seguimiento_calidad(3,{{$producto->idproducto}},{{ $producto->id_detalle }})" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" >
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="seguimiento_calidad(4,{{$producto->idproducto}},{{ $producto->id_detalle }})" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" >
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="seguimiento_calidad(5,{{$producto->idproducto}},{{ $producto->id_detalle }})" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" >
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="seguimiento_calidad(6,{{$producto->idproducto}},{{ $producto->id_detalle }})" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </div>
            </td>
            <td class="calidad">
              <div class="btn-group mx-2" role="group">
                <input type="checkbox" class="switch" data-on-label="&nbsp;Si&nbsp;" id="switch5" data-group-cls="btn-group-sm" >
                &nbsp;<span class="btn btn-outline-primary btn-sm" onclick="seguimiento_calidad(7,{{$producto->idproducto}},{{ $producto->id_detalle }})" data-toggle="modal" data-backdrop="false" data-target="#primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
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

@section('script')
  <script type="text/javascript">
    var table = $('#seguimiento_subproceso').DataTable({
      "scrollX": true,
      "fixedColumns":   {
            leftColumns:3
      },
      "paging": false
    });

    table.columns([11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34]).visible(false);
  </script>
  @endsection