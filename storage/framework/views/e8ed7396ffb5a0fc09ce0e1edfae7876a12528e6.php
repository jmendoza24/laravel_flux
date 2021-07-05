<table class="table table-striped table-bordered" id="equipoHistorials-table">
    <thead>
        <tr style="background-color:#427874;color:white">
            <th>Responsable</th>
            <th>Descripción</th>
            <th>Fecha inicio</th>
            <th>Vencimiento</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $equipoHistorials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipoHistorial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo $equipoHistorial->responsable; ?></td>
            <td><?php echo $equipoHistorial->descripcion; ?></td>
            <td><?php echo e($equipoHistorial->fecha); ?></td>
            <td><?php echo e($equipoHistorial->vencimiento != '' ? date("m-d-Y",strtotime(substr($equipoHistorial->vencimiento,0,10))) :''); ?></td>
            <td>
                <div class='btn-group'>
                    <span data-toggle="modal" data-target="#primary" onclick="ver_catalogo(1,<?php echo e($equipoHistorial->id); ?>,2,'',<?php echo e($equipoHistorial->historial_tipo); ?>,<?php echo e($equipoHistorial->id); ?>)"  class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></span>
                    <span onclick="elimina_catalogo(1,<?php echo e($equipoHistorial->id); ?>,'',<?php echo e($equipoHistorial->historial_tipo); ?>,<?php echo e($equipoHistorial->tipo); ?>)"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></span>
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/equipo_historials/table.blade.php ENDPATH**/ ?>