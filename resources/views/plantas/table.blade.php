<br/><br/><br/>
<table class="table table-striped table-bordered datacol-basic-initialisation" id="plantas-table">
<thead>
    <tr>
        <th>Nombre</th>
        <th>Planta</th>
        <th>Estado</th>
        <th>Municipio</th>
        <th>Codigo postal</th>
        <th>Telefono</th>
        <th colspan="">Action</th>
    </tr>
</thead> 
<tbody>
    @foreach($plantas as $planta)
    <tr>
        <td>{!! $planta->nombre !!}</td>
        <td>{!! $planta->id_planta !!}</td>
        <td>{!! $planta->estado !!}</td>
        <td>{!! $planta->municipio !!}</td>
        <td>{!! $planta->cp !!}</td>
        <td>{!! $planta->telefono !!}</td>
        <td>
            {!! Form::open(['route' => ['plantas.destroy', $planta->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{!! route('plantas.show', [$planta->id]) !!}" class='btn btn-float btn-outline-secondary btn-round'><i class="fa fa-thumbs-o-up"></i></a>
                <a href="{!! route('plantas.edit', [$planta->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
@endforeach
</tbody>
</table>

