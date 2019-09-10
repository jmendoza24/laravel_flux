<div class="table-responsive">
    <table class="table" id="tipoMaterials-table">
        <thead>
            <tr>
                <th>Material</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
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
                        <a href="{!! route('tipoMaterials.show', [$tipoMaterial->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('tipoMaterials.edit', [$tipoMaterial->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
