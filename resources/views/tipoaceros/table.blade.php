<table class="table table-striped table-bordered datacol-basic-initialisation" id="tipoaceros-table">
    <thead>
        <tr>
            <th>Acero</th>
            <th>Descripción</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoaceros as $tipoacero)
        <tr>
            <td>{!! $tipoacero->acero !!}</td>
            <td>{!! $tipoacero->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['tipoaceros.destroy', $tipoacero->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tipoaceros.edit', [$tipoacero->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar este registro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
