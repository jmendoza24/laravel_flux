<div class="table-responsive">
    <table class="table" id="familias-table">
        <thead>
            <tr>
                <th>Familia</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($familias as $familia)
            <tr>
                <td>{!! $familia->familia !!}</td>
            <td>{!! $familia->descripcion !!}</td>
                <td>
                    {!! Form::open(['route' => ['familias.destroy', $familia->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('familias.show', [$familia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('familias.edit', [$familia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
