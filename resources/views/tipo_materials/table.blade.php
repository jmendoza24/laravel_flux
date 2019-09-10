<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="tipoMaterials-table">
    <thead>
        <tr>
            <th>Material</th>
            <th>Descripcion</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoMaterials as $tipoMaterial)
        <tr>
            <td>{!! $tipoMaterial->material !!}</td>
        <td>{!! $tipoMaterial->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['tipoMaterials.destroy', $tipoMaterial->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tipoMaterials.edit', [$tipoMaterial->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar este tipo de material?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
