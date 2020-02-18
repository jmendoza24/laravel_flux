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
            <td>{{ $orden->orden_compra}}</td>
            <td></td>
            <td>{{ $orden->nombre_corto}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>