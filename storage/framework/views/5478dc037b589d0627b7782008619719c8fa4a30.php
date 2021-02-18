<table class="table table-striped table-bordered zero-configuration" id="cotizaciones-table">
    <thead class="bg-success">
        <tr>
            <th>Cotización</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Contacto</th>
            <th>Email contacto</th>
            <!--<th>Orden Trabajo</th>-->
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $cotizaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cotizaciones): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><a style="color: #518a87;" data-toggle="modal" data-backdrop="false" data-target="#primary" onclick="detalle_cotizacion(<?php echo $cotizaciones->id; ?>)" title="Resumen" >FX-00<?php echo $cotizaciones->id; ?></a></td>
            <td><?php echo $cotizaciones->nombre_corto; ?></td>
            <td><?php echo e(date("m-d-Y", strtotime($cotizaciones->fecha))); ?></td>
            <td><?php echo $cotizaciones->compra_nombre; ?></td>
            <td><?php echo $cotizaciones->correo_compra; ?></td>
            <!--<td><?php echo e(($cotizaciones->idot > 0) ? 'OTFX-00'.$cotizaciones->idot : ''); ?></td>-->
            <td>
                <div class='btn-group'>
                    <a onclick="revive_cotizacion(<?php echo $cotizaciones->id; ?>)" title="Modificar" class='btn  btn-float btn-outline-info btn-round'><i class="fa fa-pencil-square-o"></i></a>
                    <a  <?php if($cotizaciones->enviado==1): ?>   onclick="convierte_occ(<?php echo e($cotizaciones->id); ?>,1)" <?php endif; ?> title="Convertir a OT" class='btn  btn-float btn-outline-<?php echo e(($cotizaciones->enviado == 3)? 'primary':'info'); ?> btn-round'><i class="fa fa-step-forward "></i></a>
                    <a onclick="elimina_cotizacion(<?php echo e($cotizaciones->id); ?>)" class='btn  btn-float btn-outline-danger btn-round' title="Eliminar"><i  class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/cotizaciones/table.blade.php ENDPATH**/ ?>