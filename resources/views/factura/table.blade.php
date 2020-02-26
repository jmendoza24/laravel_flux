<table class="table display nowrap table-striped table-bordered" id="factura-table">
    <thead>
        <tr>
            <th>OCC</th>
            <th>Estatus</th>
            <th>Cliente</th>
            <th>Fecha OCC</th>            
            <th>Total</th>
            <th>Facturado</th>
            <th>Saldo</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
        @foreach($ordenes_compra as $orden)
        <tr>
            <td>
                <span class="btn btn-sm btn-outline-warning" style="cursor: pointer;" data-toggle="modal" data-backdrop="false" data-target="#primary" onclick="muestra_line_productos('{{ $orden->orden_compra}}')">
                    <i class="fa fa-info-circle" aria-hidden="true"></i></span> {{ $orden->orden_compra}}
                </td>
            <td></td>
            <td>{{ $orden->nombre_corto}}</td>
            <td></td>
            <td></td>
            <td style="text-align: right;">
                {{ number_format(0,2) }} <span class="btn btn-sm btn-outline-danger" style="cursor: pointer; " data-toggle="modal" data-backdrop="false" data-target="#primary" onclick="muestra_line_facturado('{{ $orden->orden_compra}}')">
                <i class="fa fa-info-circle" aria-hidden="true"></i></span> 
            </td>
            <td></td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>