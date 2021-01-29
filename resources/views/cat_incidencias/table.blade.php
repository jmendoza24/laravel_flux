<div class="table-responsive">
    <table class="table" id="catIncidencias-table">
        <thead>
            <tr>
                <th>Incidencia</th>
        <th>Documento</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($catIncidencias as $catIncidencias)
            <tr>
                <td>{!! $catIncidencias->incidencia !!}</td>
            <td>{!! $catIncidencias->documento !!}</td>
                <td>
                    {!! Form::open(['route' => ['catIncidencias.destroy', $catIncidencias->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('catIncidencias.show', [$catIncidencias->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('catIncidencias.edit', [$catIncidencias->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
