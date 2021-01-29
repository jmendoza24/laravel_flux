<div class="table-responsive">
    <table class="table" id="catBeneficiarios-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Rfc</th>
        <th>Domicilio</th>
        <th>Lugar Nac</th>
        <th>Fecha Nacimiento</th>
        <th>Parentesco</th>
        <th>Porcentage</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($catBeneficiarios as $catBeneficiarios)
            <tr>
                <td>{!! $catBeneficiarios->nombre !!}</td>
            <td>{!! $catBeneficiarios->rfc !!}</td>
            <td>{!! $catBeneficiarios->domicilio !!}</td>
            <td>{!! $catBeneficiarios->lugar_nac !!}</td>
            <td>{!! $catBeneficiarios->fecha_nacimiento !!}</td>
            <td>{!! $catBeneficiarios->parentesco !!}</td>
            <td>{!! $catBeneficiarios->porcentage !!}</td>
                <td>
                    {!! Form::open(['route' => ['catBeneficiarios.destroy', $catBeneficiarios->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('catBeneficiarios.show', [$catBeneficiarios->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('catBeneficiarios.edit', [$catBeneficiarios->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
