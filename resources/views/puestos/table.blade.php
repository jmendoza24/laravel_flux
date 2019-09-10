<div class="table-responsive">
    <table class="table" id="puestos-table">
        <thead>
            <tr>
                <th>Puesto</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
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
                        <a href="{!! route('puestos.show', [$puesto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('puestos.edit', [$puesto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
