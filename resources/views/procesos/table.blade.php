<div class="table-responsive">
    <table class="table" id="procesos-table">
        <thead>
            <tr>
                <th>Procesos</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($procesos as $procesos)
            <tr>
                <td>{!! $procesos->procesos !!}</td>
            <td>{!! $procesos->descripcion !!}</td>
                <td>
                    {!! Form::open(['route' => ['procesos.destroy', $procesos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('procesos.show', [$procesos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('procesos.edit', [$procesos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
