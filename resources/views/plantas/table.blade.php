<table class="table display nowrap table-striped table-bordered scroll-horizontal" id="plantas-table">
<thead>
    <tr>
        <th>Razón social</th>
        <th>Planta</th>
        <th>Estado</th>
        <th>Ciudad</th>
        <th>C.P.</th>
        <th>Teléfono</th>
        <th colspan=""></th>
    </tr>
</thead> 
<tbody>
    @foreach($plantas as $planta)
    <tr>
        <td>{!! $planta->nombre !!}</td>
        <td>{!! $planta->id_planta !!}</td>
        <td>{!! $planta->nestado !!}</td>
        <td>{!! $planta->municipio !!}</td>
        <td>{!! $planta->cp !!}</td>
        <td>{!! $planta->telefono !!}</td>
        <td>
            {!! Form::open(['route' => ['plantas.destroy', $planta->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                {{-- <a href="{!! route('plantas.show', [$planta->id]) !!}" class='btn btn-float btn-outline-secondary btn-round'><i class="fa fa-thumbs-o-up"></i></a> --}}
                <a href="{!! route('plantas.edit', [$planta->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
@endforeach
</tbody>
</table>

