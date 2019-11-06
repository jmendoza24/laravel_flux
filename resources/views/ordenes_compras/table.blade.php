<table class="table table-striped table-bordered datacol-basic-initialisation" id="ordenesCompras-table">
    <thead>
        <tr>
            <th>Orden de compra</th>
            <th>Cotización</th>
            <th>Cliente</th>
            <th>Vendedor</th>
            <th>Fecha creación</th>
            <th>Estatus</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($ordenesCompras as $ordenesCompra)
        <tr>
            <th>OCFX-00{{ $ordenesCompra->id}}</th>
            <td><a href="{!! route('cotizaciones.show', [$ordenesCompra->id_cotizacion]) !!}">FX-00{!! $ordenesCompra->id_cotizacion !!}</a></td>
            <td>{!! $ordenesCompra->nombre_corto !!}</td>
            <td>{!! $ordenesCompra->name !!}</td>
            <td>{{  date("m-d-Y", strtotime($ordenesCompra->fecha)) }}</td>
            <td><span class="badge badge-success">En progreso..</span></td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('ordenesCompras.show', [$ordenesCompra->id]) !!}" class='btn btn btn-float btn-outline-info btn-round' title="Administrador"><i class="fa fa-user"></i></a>
                    <a href="{!! route('ordenesCompras.edit', [$ordenesCompra->id]) !!}" class='btn btn btn-float btn-outline-success btn-round' title="Asignacion"><i class="fa fa-edit"></i></a>
                    <a href="{!! route('ordenesCompras.seguimiento', [$ordenesCompra->id]) !!}" class='btn btn btn-float btn-outline-primary btn-round' title="Seguimiento"><i class="fa fa-circle-o-notch" aria-hidden="true"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
