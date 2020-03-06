<table class="table display nowrap table-striped table-bordered scroll-horizontal" id="condiciones-table">
    <thead class="bg-success">
        <tr>
            <th>Tipo</th>
            <th>Condición</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($condiciones as $condiciones)
        <tr>
            <td>
                @if($condiciones->tipo ==1){{'Cotización' }}
                @elseif($condiciones->tipo ==1){{'Orden de compra' }}
                @endif
            </td>
            <td>{!! nl2br($condiciones->condicion) !!}</td>
            <td>
                {!! Form::open(['route' => ['condiciones.destroy', $condiciones->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('condiciones.edit', [$condiciones->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

