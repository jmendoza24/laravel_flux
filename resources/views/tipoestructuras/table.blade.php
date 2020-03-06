<table class="table table-striped table-bordered datacol-basic-initialisation" id="tipoestructuras-table">
    <thead class="bg-success">
        <tr>
            <th>Estructura</th>
            <th>Descripción</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoestructuras as $tipoestructura)
        <tr>
            <td>{!! $tipoestructura->estructura !!}</td>
        <td>{!! $tipoestructura->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['tipoestructuras.destroy', $tipoestructura->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tipoestructuras.edit', [$tipoestructura->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar esta estructura?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
