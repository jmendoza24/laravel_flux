<table class="table table-striped table-bordered zero-configuration" style="" id="departamentos-table">
    <thead class="bg-success">
        <tr>
            <th>Departamento</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($departamentos as $departamentos)
        <tr>
            <td>{!! $departamentos->departamento !!}</td>
            <td>
                {!! Form::open(['route' => ['departamento.destroy', $departamentos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('departamento.edit', [$departamentos->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar este departamento?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

