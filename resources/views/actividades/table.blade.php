<div class="table-responsive">
    <table class="table" id="actividades-table">
        <thead>
            <tr>
                <th>Actividad</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($actividades as $actividades)
            <tr>
                <td>{!! $actividades->actividad !!}</td>
            <td>{!! $actividades->descripcion !!}</td>
                <td>
                    {!! Form::open(['route' => ['actividades.destroy', $actividades->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('actividades.show', [$actividades->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('actividades.edit', [$actividades->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
