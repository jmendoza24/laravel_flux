<table class="table display nowrap table-striped table-bordered scroll-horizontal" id="materiales-table">
    <thead>
        <tr>
            <th>Material</th>
            <th>Proveedor</th>
            <th>Tipo Acero</th>
            <th>Forma</th>
            <th>Fecha</th>
            <th>Num Orden</th>
            <th>Num Embarque</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($materiales as $materiales)
        <tr>
            <td>{!! $materiales->material !!}</td>
            <td>{!! $materiales->nombre !!}</td>
            <td>{!! $materiales->nacero !!}</td>
            <td>{!! $materiales->nforma !!}</td>
            <td>{!! $materiales->fecha !!}</td>
            <td>{!! $materiales->num_orden !!}</td>
            <td>{!! $materiales->num_embarque !!}</td>
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
