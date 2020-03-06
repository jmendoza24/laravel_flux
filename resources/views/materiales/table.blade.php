<table class="table table-striped table-bordered" id="materiales-table">
    <thead>
        <tr>
            <th>ID Material</th>
            <th>Planta</th>
            <th>Forma</th>
            <th>Espesor</th>
            <th>Ancho</th>
            <th>Altura</th>
            <th>Pesos por distancia</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($materiales as $materiales)
        <tr>
            <td>{!! $materiales->material !!}</td>
            <td>{{ $materiales->nplanta}}</td>
            <td>{!! $materiales->nforma !!}</td>
            <td>{{ $materiales->espesor}}</td>
            <td>{{ $materiales->ancho}}</td>
            <td>{{ $materiales->altura}}</td>
            <td>{{ $materiales->peso_distancia}}</td>
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
