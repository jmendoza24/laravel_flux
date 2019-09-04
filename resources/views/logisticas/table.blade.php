<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="logisticas-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Pais</th>
            <th>Estado</th>
            <th>Municipio</th>
            <th colspan="">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($logisticas as $logistica)
        <tr>
            <td>{!! $logistica->nombre !!}</td>
        <td>{!! $logistica->telefono !!}</td>
        <td>{!! $logistica->correo !!}</td>
        <td>{!! $logistica->pais !!}</td>
        <td>{!! $logistica->estado !!}</td>
        <td>{!! $logistica->municipio !!}</td>
            <td>
                {!! Form::open(['route' => ['logisticas.destroy', $logistica->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('logisticas.show', [$logistica->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('logisticas.edit', [$logistica->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>