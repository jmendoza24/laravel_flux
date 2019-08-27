<br/><br/><br/>
    <table class="table table-striped table-bordered datacol-basic-initialisation" id="plantas-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Id Planta</th>
        <th>Direccion</th>
        <th>Colonia</th>
        <th>Municipio</th>
        <th>Estado</th>
        <th>Pais</th>
        <th>Cp</th>
        <th>Rfc</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Puesto</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($plantas as $planta)
            <tr>
                <td>{!! $planta->nombre !!}</td>
            <td>{!! $planta->id_planta !!}</td>
            <td>{!! $planta->direccion !!}</td>
            <td>{!! $planta->colonia !!}</td>
            <td>{!! $planta->municipio !!}</td>
            <td>{!! $planta->estado !!}</td>
            <td>{!! $planta->pais !!}</td>
            <td>{!! $planta->cp !!}</td>
            <td>{!! $planta->rfc !!}</td>
            <td>{!! $planta->telefono !!}</td>
            <td>{!! $planta->correo !!}</td>
            <td>{!! $planta->puesto !!}</td>
                <td>
                    {!! Form::open(['route' => ['plantas.destroy', $planta->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('plantas.show', [$planta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('plantas.edit', [$planta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

