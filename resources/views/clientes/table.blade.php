<table class="table display nowrap table-striped table-bordered scroll-horizontal" id="clientes-table">
    <thead class="bg-success">
        <tr>
            <th>Nombre Corto</th>                
            <th>País</th>
            <th>Estado</th>
            <th>Ciudad</th>
            <th>C.P.</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $clientes)
        <tr>
            <td>{!! $clientes->nombre_corto !!}</td>
            <td>{!! $clientes->npais !!}</td>
            <td>{!! $clientes->nestado !!}</td>
            <td>{!! $clientes->nmunicipio !!}</td>
            <td>{!! $clientes->cp !!}</td>
            <td>
                {!! Form::open(['route' => ['clientes.destroy', $clientes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{-- <a href="{!! route('clientes.show', [$clientes->id]) !!}" class='btn btn-float btn-outline-secondary btn-round'><i class="fa fa-thumbs-o-up"></i></a> --}}
                    <a href="{!! route('clientes.edit', [$clientes->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('¿Deseas borrar esta información?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>