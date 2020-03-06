<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="departamentos-table">
    <thead class="bg-success">
        <tr>
            <th>Familia</th>
            <th>Departamento</th>
            <th>Descripción</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($departamentos as $departamentos)
        <tr>
            <td>{!! $departamentos->familia !!}</td>
            <td>{!! $departamentos->departamento !!}</td>
            <td>{!! $departamentos->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['departamentos.destroy', $departamentos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('departamentos.edit', [$departamentos->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar este departamento?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

