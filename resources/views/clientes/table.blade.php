<br/><br/><br/>
<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="clientes-table">
    <thead>
        <tr>
            <th>Nombre Corto</th>                
            <th>Pais</th>
            <th>Estado</th>
            <th>Municipio</th>
            <th>Cp</th>
            <th>Id Proveedor</th>
            <th colspan="">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $clientes)
        <tr>
            <td>{!! $clientes->nombre_corto !!}</td>
            <td>{!! $clientes->pais !!}</td>
            <td>{!! $clientes->estado !!}</td>
            <td>{!! $clientes->municipio !!}</td>
            <td>{!! $clientes->cp !!}</td>
            <td>{!! $clientes->id_proveedor !!}</td>
            <td>
                {!! Form::open(['route' => ['clientes.destroy', $clientes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
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