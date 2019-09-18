<table class="table table-striped table-bordered datacol-basic-initialisation" id="materiales-table">
    <thead>
        <tr>
            <th>Tipo Acero</th>
            <th>Forma</th>
            <th>Grado</th>
            <th>Fecha</th>
            <th>Num Orden</th>
            <th>Id Proveedor</th>
            <th>Fecha Entrega</th>
            <th>Num Embarque</th>
            <th>Certificado Mat</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($materiales as $materiales)
        <tr>
            <td>{!! $materiales->tipo_acero !!}</td>
            <td>{!! $materiales->forma !!}</td>
            <td>{!! $materiales->grado !!}</td>
            <td>{!! $materiales->fecha !!}</td>
            <td>{!! $materiales->num_orden !!}</td>
            <td>{!! $materiales->id_proveedor !!}</td>
            <td>{!! $materiales->fecha_entrega !!}</td>
            <td>{!! $materiales->num_embarque !!}</td>
            <td>{!! $materiales->certificado_mat !!}</td>
            <td>
                {!! Form::open(['route' => ['materiales.destroy', $materiales->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('materiales.edit', [$materiales->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
