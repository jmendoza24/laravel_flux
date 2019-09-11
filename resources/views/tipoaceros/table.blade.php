<div class="table-responsive">
    <table class="table" id="tipoaceros-table">
        <thead>
            <tr>
                <th>Acero</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tipoaceros as $tipoacero)
            <tr>
                <td>{!! $tipoacero->acero !!}</td>
            <td>{!! $tipoacero->descripcion !!}</td>
                <td>
                    {!! Form::open(['route' => ['tipoaceros.destroy', $tipoacero->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('tipoaceros.show', [$tipoacero->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('tipoaceros.edit', [$tipoacero->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
