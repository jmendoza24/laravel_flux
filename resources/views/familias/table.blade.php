<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="familias-table">
    <thead>
        <tr>
            <th>Familia</th>
            <th>Descripcion</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($familias as $familia)
        <tr>
            <td>{!! $familia->familia !!}</td>
        <td>{!! $familia->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['familias.destroy', $familia->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('familias.edit', [$familia->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar esta familia?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
