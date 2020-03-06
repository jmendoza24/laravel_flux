<table class="table table-striped table-bordered datacol-basic-initialisation"  id="actividades-table">
    <thead class="bg-success">
        <tr>
            <th>Actividad</th>
            <th>Descripción</th>
            <th colspan=""></th>
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
                    <a href="{!! route('actividades.edit', [$actividades->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar esta actividad?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
