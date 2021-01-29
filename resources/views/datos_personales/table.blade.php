<div class="table-responsive">
    <table class="table" id="datosPersonales-table">
        <thead>
            <tr>
                <th>Tel Casa</th>
        <th>Tel Celular</th>
        <th>Correo</th>
        <th>Contacto1 Nombre</th>
        <th>Contacto1 Tel Casa</th>
        <th>Contacto1 Tel Celular</th>
        <th>Contacto1 Relacion</th>
        <th>Contacto2 Nombre</th>
        <th>Contacto2 Tel Casa</th>
        <th>Contacto2 Tel Cel</th>
        <th>Contaco2 Relacion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($datosPersonales as $datosPersonales)
            <tr>
                <td>{!! $datosPersonales->tel_casa !!}</td>
            <td>{!! $datosPersonales->tel_celular !!}</td>
            <td>{!! $datosPersonales->correo !!}</td>
            <td>{!! $datosPersonales->contacto1_nombre !!}</td>
            <td>{!! $datosPersonales->contacto1_tel_casa !!}</td>
            <td>{!! $datosPersonales->contacto1_tel_celular !!}</td>
            <td>{!! $datosPersonales->contacto1_relacion !!}</td>
            <td>{!! $datosPersonales->contacto2_nombre !!}</td>
            <td>{!! $datosPersonales->contacto2_tel_casa !!}</td>
            <td>{!! $datosPersonales->contacto2_tel_cel !!}</td>
            <td>{!! $datosPersonales->contaco2_relacion !!}</td>
                <td>
                    {!! Form::open(['route' => ['datosPersonales.destroy', $datosPersonales->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('datosPersonales.show', [$datosPersonales->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('datosPersonales.edit', [$datosPersonales->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
