<br/><br/><br/>
<table class="table table-striped table-bordered datacol-basic-initialisation" id="productos-table">
    <thead>
        <tr>
            <th>Descripcion</th>
            <th>Familia</th>
            <th>Id Empresa</th>
            <th>Id Acero</th>
            <th>Id Estructura</th>
            <th>Espesor</th>
            <th>Ancho</th>
            <th colspan="">Action</th>
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
                        <a href="{!! route('productos.show', [$productos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('productos.edit', [$productos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
        </tr>
    @endforeach
    </tbody>
</table>

