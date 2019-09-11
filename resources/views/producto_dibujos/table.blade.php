<table class="table table-striped table-bordered datacol-basic-initialisation" id="productoDibujos-table">
    <thead>
        <tr>
            <th>Id Producto</th>
            <th>Dibujo</th>
            <th>Fecha</th>
            <th>Revision</th>
            <th>Tiempo Entrega</th>
            <th colspan=""></th>
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
                <div class='btn-group'>
                    {!! Form::button('<i class="fa fa-edit"></i>', ['class' => 'btn btn-float btn-outline-success btn-round', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
