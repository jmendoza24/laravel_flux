<div class="table-responsive">
    <table class="table" id="cotizaciones-table">
        <thead>
            <tr>
                <th>Fecha</th>
        <th>Cliente</th>
        <th>Numero Parte</th>
        <th>Descripcion</th>
        <th>Dibujo</th>
        <th>Cantidad</th>
        <th>Costo</th>
        <th>Precio Usd</th>
        <th>Id Notas</th>
        <th>Tiempo</th>
        <th>Income</th>
        <th>Termino Pago</th>
        <th>Vendedor</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cotizaciones as $cotizaciones)
            <tr>
                <td>{!! $cotizaciones->fecha !!}</td>
            <td>{!! $cotizaciones->cliente !!}</td>
            <td>{!! $cotizaciones->numero_parte !!}</td>
            <td>{!! $cotizaciones->descripcion !!}</td>
            <td>{!! $cotizaciones->dibujo !!}</td>
            <td>{!! $cotizaciones->cantidad !!}</td>
            <td>{!! $cotizaciones->costo !!}</td>
            <td>{!! $cotizaciones->precio_usd !!}</td>
            <td>{!! $cotizaciones->id_notas !!}</td>
            <td>{!! $cotizaciones->tiempo !!}</td>
            <td>{!! $cotizaciones->income !!}</td>
            <td>{!! $cotizaciones->termino_pago !!}</td>
            <td>{!! $cotizaciones->vendedor !!}</td>
                <td>
                    {!! Form::open(['route' => ['cotizaciones.destroy', $cotizaciones->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('cotizaciones.show', [$cotizaciones->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('cotizaciones.edit', [$cotizaciones->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
