<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="grados-table">
    <thead class="bg-success">
        <tr>
            <th>Grado</th>
            <th>Descripción</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($grados as $grado)
        <tr>
            <td>{!! $grado->grado !!}</td>
            <td>{!! $grado->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['grados.destroy', $grado->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('grados.edit', [$grado->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar este registro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

