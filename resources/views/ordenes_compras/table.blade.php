<table class="table display nowrap table-striped table-bordered scroll-horizontal" id="ordenesCompras-table">
    <thead>
        <tr>
    
            <th>OCC</th>
            <th>Cliente</th>
            <th>Fecha OCC</th>            
            <th>Productos</th>
            <th>Total prod</th>
            <th>Monto total</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($ordenesCompras as $ordenesCompra)
    @if($ordenesCompra->tipo==1 && Auth::user()->tipo==1)
        <tr>
            <th>{{ $ordenesCompra->orden_compra}}</th>
            <td>{!! $ordenesCompra->nombre_corto !!}</td>
            <td>{{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}</td>
            <td>
                <ul>
                @foreach($productos as $prod)
                    @if($prod->id ==$ordenesCompra->id)
                    <li>{{$prod->numero_parte}}</li>
                    @endif

                @endforeach
                </ul>
            </td>
            <td style="text-align: center;">{{ $ordenesCompra->cantidad}}</td>
            <td style="text-align: right;">${{ number_format($ordenesCompra->total,2)}}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('ordenesCompras.show', [$ordenesCompra->id]) !!}" class='btn  btn-float btn-outline-info btn-round' title="Administrador" style="{{($ordenesCompra->tipo==2)?'background: #6d6d6d; color:white;':''}}" ><i class="fa fa-check"></i></a>
                    <a href="{!! route('ordenesCompras.seguimiento', [$ordenesCompra->id]) !!}" class='btn  btn-float btn-outline-info btn-round' title="Seguimiento"><i  class="fa fa-list-ul" aria-hidden="true"></i></a>                    
                </div>
            </td>
        </tr>
        @elseif($ordenesCompra->tipo==2 && Auth::user()->tipo==0)
        <tr>
            <th>{{ $ordenesCompra->orden_compra}}</th>
            <td>{!! $ordenesCompra->nombre_corto !!}</td>
            <td>{{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}</td>
            <td>
                <ul>
                @foreach($productos as $prod)
                    @if($prod->id ==$ordenesCompra->id)
                    <li>{{$prod->numero_parte}}</li>
                    @endif

                @endforeach
                </ul>
            </td>
            <td style="text-align: center;">{{ $ordenesCompra->cantidad}}</td>
            <td style="text-align: right;">${{ number_format($ordenesCompra->total,2)}}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('ordenesCompras.edit', [$ordenesCompra->id]) !!}" class='btn  btn-float btn-outline-info btn-round' title="Asignacion"><i  class="fa fa-share-alt"></i></a>
                </div>
            </td>
        </tr>

        @endif
    @endforeach
    </tbody>
</table>
