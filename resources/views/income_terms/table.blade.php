<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="incomeTerms-table">
    <thead>
        <tr>
            <th>Income</th>
            <th>Descripcion</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($incomeTerms as $incomeTerms)
        <tr>
            <td>{!! $incomeTerms->income !!}</td>
        <td>{!! $incomeTerms->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['incomeTerms.destroy', $incomeTerms->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('incomeTerms.edit', [$incomeTerms->id]) !!}" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar este registro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

