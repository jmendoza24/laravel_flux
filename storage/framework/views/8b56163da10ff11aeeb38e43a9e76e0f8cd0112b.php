 <table class="table table-bordered table-striped zero-configuration" id="puestos-table">
    <thead>
        <tr>
            <th>Puesto</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $puestos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puestos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo $puestos->puesto; ?></td>
            <td>
                <?php echo Form::open(['route' => ['puestos.destroy', $puestos->id], 'method' => 'delete']); ?>

                <div class='btn-group'>
                    <a href="<?php echo route('puestos.edit', [$puestos->id]); ?>" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Esta seguro deseas eliminar este registro?')"]); ?>

                </div>
                <?php echo Form::close(); ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/puestos/table.blade.php ENDPATH**/ ?>