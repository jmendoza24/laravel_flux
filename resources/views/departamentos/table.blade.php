<div class="table-responsive">
    <table class="table" id="departamentos-table">
        <thead>
            <tr>
                <th>Id Familia</th>
        <th>Departamento</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($departamentos as $departamentos)
            <tr>
                <td>{!! $departamentos->id_familia !!}</td>
            <td>{!! $departamentos->departamento !!}</td>
            <td>{!! $departamentos->descripcion !!}</td>
                <td>
                    {!! Form::open(['route' => ['departamentos.destroy', $departamentos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('departamentos.show', [$departamentos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('departamentos.edit', [$departamentos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
