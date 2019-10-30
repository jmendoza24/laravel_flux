<table class="table table-striped table-bordered datacol-basic-initialisation" id="cotizaciones-table">
    <thead>
        <tr>
            <th>Cotización</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Vendedor</th>
            <th colspan="">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cotizaciones as $cotizaciones)
        <tr>
            <td>FX-00{!! $cotizaciones->id !!}</td>
            <td>{!! $cotizaciones->nombre_corto !!}</td>
            <td>{{  date("m-d-Y", strtotime($cotizaciones->fecha)) }}</td>
            <td>{!! $cotizaciones->name !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('cotizaciones.show', [$cotizaciones->id]) !!}" class='btn btn-float btn-outline-info btn-round'><i class="fa fa-window-restore"></i></a>
                    <button onclick="convierte_occ({{$cotizaciones->id}})" {{($cotizaciones->enviado == 3)? 'disabled':''}} class='btn btn-float btn-outline-primary btn-round'><i class="fa fa-cc"></i></button>
                    <a onclick="elimina_cotizacion({{ $cotizaciones->id }})" class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
