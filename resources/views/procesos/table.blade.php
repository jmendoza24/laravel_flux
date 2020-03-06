<table class="table table-striped table-bordered datacol-basic-initialisation"  id="procesos-table">
<thead class="bg-success">
    <tr>
        <th>Procesos</th>
        <!--<th>Horas hombre</th>-->
        <th>Descripción</th>
        <th colspan=""></th>
    </tr>
    </thead>
    <tbody>
    @foreach($procesos as $procesos)
        <tr>
            <td>{!! $procesos->procesos !!}</td>
            <!--<td>{!! $procesos->horas !!} horas</td>-->
            <td>{!! $procesos->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['procesos.destroy', $procesos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('procesos.edit', [$procesos->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar este proceso?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>