<div class="table-responsive">
    <table class="table" id="condiciones-table">
        <thead>
            <tr>
                <th>Tipo</th>
        <th>Condicion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($condiciones as $condiciones)
            <tr>
                <td>{!! $condiciones->tipo !!}</td>
            <td>{!! $condiciones->condicion !!}</td>
                <td>
                    {!! Form::open(['route' => ['condiciones.destroy', $condiciones->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('condiciones.show', [$condiciones->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('condiciones.edit', [$condiciones->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
