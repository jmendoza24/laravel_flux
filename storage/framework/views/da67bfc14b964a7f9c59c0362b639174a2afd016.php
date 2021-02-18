<table class="table display nowrap table-striped table-bordered zero-configuration" style="" id="productos-table">
        <thead class="bg-success">
            <tr>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Serie</th>
                <th>Planta</th>
                <th>Calibración</th>
                <th>Prox Mtto.</th>
                <th>Ultimo Mtto. Correctivo</th>
                <th colspan=""></th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $equipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo $equipos->nombre; ?></td>
                <td><?php echo $equipos->marca; ?></td>
                <td><?php echo $equipos->modelo; ?></td>
                <td><?php echo $equipos->serie; ?></td>
                <td><?php echo $equipos->nom_planta; ?></td>
                <td><?php echo e($equipos->calibracion != '' ? date("m-d-Y",strtotime(substr($equipos->calibracion,0,10))) :''); ?></td>
                <td><?php echo e($equipos->preventivo != '' ? date("m-d-Y",strtotime(substr($equipos->preventivo,0,10))) :''); ?></td>
                <td><?php echo e($equipos->correctivo != '' ? date("m-d-Y",strtotime(substr($equipos->correctivo,0,10))) :''); ?></td>
                <td>
                    <?php echo Form::open(['route' => ['equipos.destroy', $equipos->id], 'method' => 'delete']); ?>

                    <div class='btn-group'>
                        
                        <a href="<?php echo route('equipos.edit', [$equipos->id]); ?>" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                        <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Are you sure?')"]); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/equipos/table.blade.php ENDPATH**/ ?>