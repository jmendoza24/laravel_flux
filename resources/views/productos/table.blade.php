<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="productos-table">
    <thead>
        <tr>
            <th>Descripción</th>
            <th>Familia</th>
            <th>Cliente</th>
            <th>Acero</th>
            <th>Estructura</th>
            <th>Espesor</th>
            <th>Ancho</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $productos)
        <tr>
            <td>{!! $productos->descripcion !!}</td>
            <td>{!! $productos->familia !!}</td>
            <td>{!! $productos->id_empresa !!}</td>
            <td>{!! $productos->id_acero !!}</td>
            <td>{!! $productos->id_estructura !!}</td>
            <td>{!! $productos->espesor !!}</td> 
            <td>{!! $productos->ancho !!}</td>
                <td>
                    {!! Form::open(['route' => ['productos.destroy', $productos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('productos.show', [$productos->id]) !!}" class='btn btn-float btn-outline-secondary btn-round'><i class="fa fa-thumbs-o-up"></i></a>
                        <a href="{!! route('productos.edit', [$productos->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
        </tr>
    @endforeach
    </tbody>
</table>

