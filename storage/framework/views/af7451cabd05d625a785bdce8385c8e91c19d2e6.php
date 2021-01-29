<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="logisticas-table">
    <thead class="bg-success">
        <tr>
            <!--<th>Nombre</th>
            <th>Correo</th>-->
            <th>País</th>
            <th>Estado</th>
            <th>Ciudad</th>
            <th>Teléfono</th>
            <th>Código postal</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $logisticas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logistica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <!--<td><?php echo $logistica->nombre; ?></td>
            <td><?php echo $logistica->correo; ?></td>--->
            <td><?php echo $logistica->npais; ?></td>
            <td><?php echo $logistica->nestado; ?></td>
            <td><?php echo $logistica->nmunicipio; ?></td>
            <td><?php echo $logistica->telefono; ?></td>
            <td><?php echo $logistica->cp; ?></td>
            <td>
                <div class='btn-group'>
                    <a href="" data-toggle="modal" data-target="#large" onclick="show_logistica(<?php echo e($logistica->id); ?>)"  class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    <a onclick="delete_logistica(<?php echo e($logistica->id); ?>,<?php echo e($logistica->id_producto); ?>)"  class='btn btn-float btn-outline-danger btn-round'><i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /var/www/html/flux/laravel/resources/views/logisticas/table.blade.php ENDPATH**/ ?>