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
    @foreach($ordenesCompras as $ordenesCompra)
    
        @if($ordenesCompra->tipo==2 && Auth::user()->tipo==0)
        <tr>
            <td>{{$ordenesCompra->id}}</td>
            <td>
                <span class=""><i class="fa fa-info" aria-hidden="true"></i></span>
                {{ $ordenesCompra->orden_compra}}
            </td>
            <!--<td>{{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}</td>-->
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
            <td></td>
            <td>
                @if($ordenesCompra->tipo < 2)
                 No Asignado
                @elseif($ordenesCompra->tipo==3)
                Asignado
                @elseif($ordenesCompra->tipo==4)
                Enviado
                @endif
            </td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('ordenesCompras.edit', [$ordenesCompra->id]) !!}" class='btn  btn-float btn-outline-info btn-round' title="Asignacion" style="{{($ordenesCompra->tipo==3)?'background: #518a87; color:white;':''}}"><i  class="fa fa-share-alt"></i></a>
                </div>
            </td>
        </tr>
        @elseif(Auth::user()->tipo==1)
        <tr>
            <td>{{$ordenesCompra->id}}</td>
            <th>
                <span class="badge badge-success" style="cursor: pointer;" data-toggle="modal" data-backdrop="false" data-target="#primary" onclick="muestra_productos({{$ordenesCompra->id}})"><i class="fa fa-info" aria-hidden="true"></i></span>
                {{ $ordenesCompra->orden_compra}}
            </th>
            <!--<td>{{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}</td>-->
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
            <td></td>
            <td>
                 @if($ordenesCompra->tipo < 2)
                No Asignado
                @elseif($ordenesCompra->tipo==3)
                Asignado
                @elseif($ordenesCompra->tipo==4)
                Enviado
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
    </tbody>
</table>
