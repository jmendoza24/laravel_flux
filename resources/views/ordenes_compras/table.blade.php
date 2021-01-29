<table class="table table-striped table-bordered " id="ordenesCompras-table">
    <thead class="bg-success">
        <tr>
            <th>OT</th>
            <th>OCC</th>
            <th>Fecha OCC</th>
            <th>Cliente</th>
            <!--<th>Productos</th>-->
            <th>Ctd. Piezas</th>
            <!--<th>Fecha Entrega</th>-->
            <th>Estatus</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
        @if(sizeof($ordenesCompras)>0)
    @foreach($ordenesCompras as $ordenesCompra)
    
        @if(Auth::user()->tipo==0 && $ordenesCompra->tipo ==2)
            <tr>
                <td>{{$ordenesCompra->id}}</td>
                <td>
                    <span class=""><i class="fa fa-info" aria-hidden="true"></i></span>
                    {{ $ordenesCompra->orden_compra}}
                </td>
                <td>{{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}</td>
                <td style="text-align: center;">{{ $ordenesCompra->nombre_corto}}</td>
                <td style="text-align: center;">{{ $ordenesCompra->cantidad}}</td>

                <td>
                    @if($ordenesCompra->tipo ==1)
                     Por validar
                    @elseif($ordenesCompra->tipo==2)
                    Por asignar
                    @elseif($ordenesCompra->tipo==3)
                    En enviar
                    @elseif($ordenesCompra->tipo==4)
                      En seguimiento

                    @endif
                </td>
                <td>
                    <div class='btn-group'>
                        <a href="{!! route('ordenesCompras.edit', [$ordenesCompra->id]) !!}" class='btn  btn-float btn-outline-info btn-round' title="Asignacion" style="{{($ordenesCompra->tipo==3)?'background: #518a87; color:white;':''}}"><i  class="fa fa-share-alt"></i></a>
                    </div>
                </td>
            </tr>
        
        @else
        <tr>
            <td>{{$ordenesCompra->id}}</td>
            <th>
                <span class="badge badge-success" style="cursor: pointer;" data-toggle="modal" data-backdrop="false" data-target="#primary" onclick="muestra_productos({{$ordenesCompra->id}})"><i class="fa fa-info" aria-hidden="true"></i></span>
                {{ $ordenesCompra->orden_compra}}
            </th>
            <td>{{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}</td>
            <td>{!! $ordenesCompra->nombre_corto !!}</td>
            {{-- <td>
                <ul>
                @foreach($productos as $prod)
                    @if($prod->id ==$ordenesCompra->id)
                    <li>{{$prod->numero_parte}}</li>
                    @endif
 
                @endforeach
                </ul>
            </td> --}}
            <td style="text-align: center;">{{ $ordenesCompra->cantidad}}</td>
            <td>
                 @if($ordenesCompra->tipo ==1)
                 Por validar
                @elseif($ordenesCompra->tipo==2)
                Por asignar
                @elseif($ordenesCompra->tipo==3)
                Por enviar
                @elseif($ordenesCompra->tipo==4)
                 En seguimiento

                @endif
            </td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('ordenesCompras.edit', [$ordenesCompra->id]) !!}" class='btn  btn-float btn-outline-info btn-round' title="Asignacion" style="{{($ordenesCompra->tipo==3)?'background: #518a87; color:white;':''}}"><i  class="fa fa-share-alt"></i></a>
                    <a href="{!! route('ordenesCompras.show', [$ordenesCompra->id]) !!}" class='btn  btn-float btn-outline-info btn-round' title="Administrador" style="{{($ordenesCompra->tipo==3)?'background: #518a87; color:white;':''}}" ><i class="fa fa-check"></i></a>
                    <!--<a href="{!! route('ordenesCompras.seguimiento', [$ordenesCompra->id]) !!}" class='btn  btn-float btn-outline-info btn-round' title="Seguimiento"><i  class="fa fa-list-ul" aria-hidden="true"></i></a>                    --->
                </div>
            </td>
        </tr>
        @endif
    @endforeach
    @endif
    </tbody>
</table>
