<table class="table table-striped table-bordered" id="materiales-table">
    <thead class="bg-success">
        <tr>
            <th>ID Material</th>
            <th>Planta</th>
            <th>Forma</th>
            <th>Espesor</th>
            <th>Ancho</th>
            <th>Altura</th>
            <th>Pesos por distancia</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $materiales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materiales): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo $materiales->material; ?></td>
            <td><?php echo e($materiales->nplanta); ?></td>
            <td><?php echo $materiales->nforma; ?></td>
            <td><?php echo e($materiales->espesor); ?></td>
            <td><?php echo e($materiales->ancho); ?></td>
            <td><?php echo e($materiales->altura); ?></td>
            <td><?php echo e($materiales->peso_distancia); ?></td>
            <td>
                <?php echo Form::open(['route' => ['materiales.destroy', $materiales->id], 'method' => 'delete']); ?>

                <div class='btn-group'>
                    <a href="<?php echo route('materiales.edit', [$materiales->id]); ?>" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('¿Seguro que desea borrar el material?')"]); ?>

                </div>
                <?php echo Form::close(); ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH /var/www/html/flux/laravel/resources/views/materiales/table.blade.php ENDPATH**/ ?>