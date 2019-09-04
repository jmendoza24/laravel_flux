<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="clientes-table">
    <thead>
        <tr>
            <th>Nombre Corto</th>                
            <th>Pais</th>
            <th>Estado</th>
            <th>Municipio</th>
            <th>Cp</th>
            <th>Proveedor</th>
            <th colspan=""></th>
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
            <td>{!! $clientes->nproveedor !!}</td>
            <td>
                {!! Form::open(['route' => ['clientes.destroy', $clientes->id], 'method' => 'delete']) !!}
                <div class=''>
                    <a href="{!! route('clientes.show', [$clientes->id]) !!}" class='btn btn-float btn-outline-secondary btn-round'><i class="fa fa-thumbs-o-up"></i></a>
                    <a href="{!! route('clientes.edit', [$clientes->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>