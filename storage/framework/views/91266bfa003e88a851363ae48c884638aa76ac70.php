<table class="table table-striped table-bordered datacol-basic-initialisation" id="equipoHistorials_corect-table">
    <thead>
        <tr style="background-color:#427874;color:white">
            <th>Registro</th>
            <th>Descripción</th>
            <th>Vencimiento</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $equipoHistCorrect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipoHistorial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo $equipoHistorial->responsable; ?></td>
            <td><?php echo $equipoHistorial->descripcion; ?></td>
            <td><?php echo e(date("m-d-Y", strtotime($equipoHistorial->vencimiento))); ?> </td>

            <td>
                <div class='btn-group'>
                    <a data-toggle="modal" data-target="#equipo_historials" onclick="show_historial(<?php echo e($equipoHistorial->tipo); ?>,<?php echo e($equipoHistorial->id); ?>)"  class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    <a onclick="delete_historial(<?php echo e($equipoHistorial->id); ?>,<?php echo e($equipoHistorial->tipo); ?>,<?php echo e($equipoHistorial->historial_tipo); ?>)"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /var/www/html/flux/laravel/resources/views/equipo_historials/table_correctivo.blade.php ENDPATH**/ ?>