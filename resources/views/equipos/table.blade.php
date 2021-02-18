<table class="table display nowrap table-striped table-bordered zero-configuration" style="" id="productos-table">
        <thead class="bg-success">
            <tr>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Serie</th>
                <th>Planta</th>
                <th>Calibración</th>
                <th>Prox Mtto.</th>
                <th>Ultimo Mtto. Correctivo</th>
                <th colspan=""></th>
            </tr>
        </thead>
        <tbody>
        @foreach($equipos as $equipos)
            <tr>
                <td>{!! $equipos->nombre !!}</td>
                <td>{!! $equipos->marca !!}</td>
                <td>{!! $equipos->modelo !!}</td>
                <td>{!! $equipos->serie !!}</td>
                <td>{!! $equipos->nom_planta !!}</td>
                <td>{{ $equipos->calibracion != '' ? date("m-d-Y",strtotime(substr($equipos->calibracion,0,10))) :''}}</td>
                <td>{{ $equipos->preventivo != '' ? date("m-d-Y",strtotime(substr($equipos->preventivo,0,10))) :''}}</td>
                <td>{{ $equipos->correctivo != '' ? date("m-d-Y",strtotime(substr($equipos->correctivo,0,10))) :''}}</td>
                <td>
                    {!! Form::open(['route' => ['equipos.destroy', $equipos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{-- <a href="{!! route('equipos.show', [$equipos->id]) !!}" class='btn btn-float btn-outline-secondary btn-round'><i class="fa fa-thumbs-o-up"></i></a> --}}
                        <a href="{!! route('equipos.edit', [$equipos->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
