    <table class="table display nowrap table-striped table-bordered scroll-horizontal" style="" id="proveedores-table">
        <thead>
            <tr>
                <th>Razón social</th>
                <th>Dirección</th>
                <th>Pais</th>
                <th>Estado</th>
                <th>Ciudad</th>
                <th>C.P.</th>
                <th>Rfc</th>
                <th>Credito</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Puesto</th>
                <th colspan=""></th>
            </tr>
        </thead>
        <tbody>
        @foreach($proveedores as $proveedores)
            <tr>
                <td>{{ $proveedores->nombre}}</td>
                <td>{!! $proveedores->direccion !!}</td>
                <td>{!! $proveedores->npais !!}</td>
                <td>{!! $proveedores->nestado !!}</td>
                <td>{!! $proveedores->nmunicipio !!}</td>
                <td>{!! $proveedores->cp !!}</td>
                <td>{!! $proveedores->rfc !!}</td>
                <td>{!! $proveedores->credito !!}</td>
                <td>{!! $proveedores->telefono !!}</td>
                <td>{!! $proveedores->correo !!}</td>
                <td>{!! $proveedores->puesto !!}</td>
                <td>
                    {!! Form::open(['route' => ['proveedores.destroy', $proveedores->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <!--<a href="{!! route('proveedores.show', [$proveedores->id]) !!}" class='btn btn-float btn-outline-secondary btn-round'><i class="fa fa-thumbs-o-up"></i></a>--->
                        <a href="{!! route('proveedores.edit', [$proveedores->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
