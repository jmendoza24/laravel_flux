<div class="table-responsive">
    <table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="proveedores-table">
        <thead>
            <tr>
                <th>Direccion</th>
                <th>Pais</th>
                <th>Estado</th>
                <th>Municipio</th>
                <th>Cp</th>
                <th>Rfc</th>
                <th>Credito</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Puesto</th>
                <th colspan="">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($proveedores as $proveedores)
            <tr>
                <td>{!! $proveedores->direccion !!}</td>
                <td>{!! $proveedores->pais !!}</td>
                <td>{!! $proveedores->estado !!}</td>
                <td>{!! $proveedores->municipio !!}</td>
                <td>{!! $proveedores->cp !!}</td>
                <td>{!! $proveedores->rfc !!}</td>
                <td>{!! $proveedores->credito !!}</td>
                <td>{!! $proveedores->telefono !!}</td>
                <td>{!! $proveedores->correo !!}</td>
                <td>{!! $proveedores->puesto !!}</td>
                <td>
                    {!! Form::open(['route' => ['proveedores.destroy', $proveedores->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('proveedores.show', [$proveedores->id]) !!}" class='btn btn-float btn-outline-secondary btn-round'><i class="fa fa-thumbs-o-up"></i></a>
                        <a href="{!! route('proveedores.edit', [$proveedores->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
