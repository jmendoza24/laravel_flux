<div class="table-responsive">
    <table class="table" id="subprocesos-table">
        <thead>
            <tr>
                <th>Idproceso</th>
        <th>Subproceso</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($subprocesos as $subprocesos)
            <tr>
                <td>{!! $subprocesos->idproceso !!}</td>
            <td>{!! $subprocesos->subproceso !!}</td>
            <td>{!! $subprocesos->descripcion !!}</td>
                <td>
                    {!! Form::open(['route' => ['subprocesos.destroy', $subprocesos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('subprocesos.show', [$subprocesos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('subprocesos.edit', [$subprocesos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
