<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="subprocesos-table">
    <thead>
        <tr>
            <th>Proceso</th>
            <th>Subproceso</th>
            <th>Descripcion</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($subprocesos as $subprocesos)
        <tr>
            <td>{!! $subprocesos->procesos !!}</td>
            <td>{!! $subprocesos->subproceso !!}</td>
            <td>{!! $subprocesos->descripcion !!}</td>
                <td>
                    {!! Form::open(['route' => ['subprocesos.destroy', $subprocesos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('subprocesos.edit', [$subprocesos->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar este subproceso?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
        </tr>
    @endforeach
    </tbody>
</table>

