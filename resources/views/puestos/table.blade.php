<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="puestos-table">
    <thead>
        <tr>
            <th>Puesto</th>
            <th>Descripción</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($puestos as $puesto)
        <tr>
            <td>{!! $puesto->puesto !!}</td>
            <td>{!! $puesto->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['puestos.destroy', $puesto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('puestos.edit', [$puesto->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
