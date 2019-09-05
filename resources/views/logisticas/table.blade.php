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
            <td>{!! $logistica->npais !!}</td>
            <td>{!! $logistica->nestado !!}</td>
            <td>{!! $logistica->nmunicipio !!}</td>
            <td>
                {!! Form::open(['route' => ['logisticas.destroy', $logistica->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!---<a href="{!! route('logisticas.show', [$logistica->id]) !!}" class='btn btn-float btn-outline-secondary btn-round'><i class="fa fa-thumbs-o-up"></i></a>--->
                    <a href="" data-toggle="modal" data-target="#large_logistic" onclick="show_logistica({{$logistica->id}})"  class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>