<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="tipoEquipos-table">
    <thead class="bg-success">
        <tr>
            <th>Equipo</th>
            <th>Descripción</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoEquipos as $tipoEquipo)
        <tr>
            <td>{!! $tipoEquipo->equipo !!}</td>
            <td>{!! $tipoEquipo->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['tipoEquipos.destroy', $tipoEquipo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tipoEquipos.edit', [$tipoEquipo->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar este tipo?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
