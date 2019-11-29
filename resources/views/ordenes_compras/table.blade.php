<table class="table table-striped table-bordered datacol-basic-initialisation" id="ordenesCompras-table">
    <thead>
        <tr>
            <th>OT</th>
            <th>Cotización</th>
            <th>OCC</th>
            <th>Cliente</th>
            <th>Fecha creación</th>            
            <th>Estatus</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($ordenesCompras as $ordenesCompra)
        <tr>
            <th>OTFX-00{{ $ordenesCompra->id}}</th>
            <td><a style="color: #518a87;" data-toggle="modal" data-backdrop="false" data-target="#primary" onclick="detalle_cotizacion({!! $ordenesCompra->id_cotizacion !!})" >FX-00{!! $ordenesCompra->id_cotizacion !!}</a></td>
            <td>{{$ordenesCompra->orden_compra}}</td>
            <td>{!! $ordenesCompra->nombre_corto !!}</td>
            <td>{{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}</td>
            <td><span class="badge" style="background: #6d6d6d;">{{ $ordenesCompra->estatus}}</span></td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('ordenesCompras.show', [$ordenesCompra->id]) !!}" class='btn  btn-float btn-outline-info btn-round' title="Administrador" style="{{($ordenesCompra->tipo==2)?'background: #6d6d6d; color:white;':''}}" ><i class="fa fa-check"></i></a>
                    <a href="{!! route('ordenesCompras.edit', [$ordenesCompra->id]) !!}" class='btn  btn-float btn-outline-info btn-round' title="Asignacion"><i  class="fa fa-share-alt"></i></a>
                    <a href="{!! route('ordenesCompras.seguimiento', [$ordenesCompra->id]) !!}" class='btn  btn-float btn-outline-info btn-round' title="Seguimiento"><i  class="fa fa-list-ul" aria-hidden="true"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
