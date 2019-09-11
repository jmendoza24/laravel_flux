<div class="table-responsive">
    <table class="table" id="productoDibujos-table">
        <thead>
            <tr>
                <th>Id Producto</th>
        <th>Dibujo</th>
        <th>Fecha</th>
        <th>Revision</th>
        <th>Tiempo Entrega</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productoDibujos as $productoDibujo)
            <tr>
                <td>{!! $productoDibujo->id_producto !!}</td>
            <td>{!! $productoDibujo->dibujo !!}</td>
            <td>{!! $productoDibujo->fecha !!}</td>
            <td>{!! $productoDibujo->revision !!}</td>
            <td>{!! $productoDibujo->tiempo_entrega !!}</td>
                <td>
                    {!! Form::open(['route' => ['productoDibujos.destroy', $productoDibujo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('productoDibujos.show', [$productoDibujo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('productoDibujos.edit', [$productoDibujo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
