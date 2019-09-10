<div class="table-responsive">
    <table class="table" id="grados-table">
        <thead>
            <tr>
                <th>Grado</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
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
                        <a href="{!! route('grados.show', [$grado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('grados.edit', [$grado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
