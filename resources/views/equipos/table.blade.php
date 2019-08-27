<br/><br/><br/>
<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="productos-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Serie</th>
                <th>Tipo</th>
                <th>Base</th>
                <th>Calibracion</th>
                <th colspan="">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($equipos as $equipos)
            <tr>
                <td>{!! $equipos->nombre !!}</td>
                <td>{!! $equipos->marca !!}</td>
                <td>{!! $equipos->modelo !!}</td>
                <td>{!! $equipos->serie !!}</td>
                <td>{!! $equipos->tipo !!}</td>
                <td>{!! $equipos->base !!}</td>
                <td>{!! $equipos->calibracion !!}</td>
                <td>
                    {!! Form::open(['route' => ['equipos.destroy', $equipos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('equipos.show', [$equipos->id]) !!}" class='btn btn-float btn-outline-secondary btn-round'><i class="fa fa-thumbs-o-up"></i></a>
                        <a href="{!! route('equipos.edit', [$equipos->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
