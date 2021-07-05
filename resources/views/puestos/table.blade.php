 <table class="table table-bordered table-striped zero-configuration" id="puestos-table">
    <thead class="bg-success">
        <tr>
            <th>Puesto</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($puestos as $puestos)
        <tr>
            <td>{!! $puestos->puesto !!}</td>
            <td>
                {!! Form::open(['route' => ['puestos.destroy', $puestos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('puestos.edit', [$puestos->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Esta seguro deseas eliminar este registro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
