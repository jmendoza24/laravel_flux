<table class="table display nowrap table-striped table-bordered scroll-horizontal" id="cotizaciones-table">
    <thead>
        <tr>
            <th>Cotización</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Contacto</th>
            <th>Email contacto</th>
            <th>Orden Trabajo</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    @foreach($cotizaciones as $cotizaciones)
        <tr>
            <td><a style="color: #518a87;" data-toggle="modal" data-backdrop="false" data-target="#primary" onclick="detalle_cotizacion({!! $cotizaciones->id !!})" title="Resumen" >FX-00{!! $cotizaciones->id !!}</a></td>
            <td>{!! $cotizaciones->nombre_corto !!}</td>
            <td>{{  date("m-d-Y", strtotime($cotizaciones->fecha)) }}</td>
            <td>{!! $cotizaciones->compra_nombre !!}</td>
            <td>{!! $cotizaciones->correo_compra !!}</td>
            <td>{{ ($cotizaciones->idot > 0) ? 'OTFX-00'.$cotizaciones->idot : '' }}</td>
            <td>
                <div class='btn-group'>
                    <a onclick="revive_cotizacion({!! $cotizaciones->id !!})" title="Modificar" class='btn  btn-float btn-outline-info btn-round'><i class="fa fa-pencil-square-o"></i></a>
                    <a  @if($cotizaciones->enviado==1)   onclick="convierte_occ({{$cotizaciones->id}},1)" @elseif ($cotizaciones->enviado == 3) style="background:  #6d6d6d; color: white;" @endif title="Convertir a OT" class='btn  btn-float btn-outline-{{($cotizaciones->enviado == 3)? 'primary':'info'}} btn-round'><i class="fa fa-step-forward "></i></a>
                    <a onclick="elimina_cotizacion({{ $cotizaciones->id }})" class='btn  btn-float btn-outline-danger btn-round' title="Eliminar"><i  class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
