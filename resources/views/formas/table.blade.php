<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="formas-table">
        <thead>
            <tr>
                <th>Forma</th>
                <th>Descripción</th>
                <th colspan=""></th>
            </tr>
        </thead>
        <tbody>
        @foreach($formas as $forma)
            <tr>
                <td>{!! $forma->forma !!}</td>
            <td>{!! $forma->descripcion !!}</td>
                <td>
                    {!! Form::open(['route' => ['formas.destroy', $forma->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('formas.edit', [$forma->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar este registro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>