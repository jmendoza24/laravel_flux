<div class="table-responsive">
    <table class="table" id="puestos-table">
        <thead>
            <tr>
                <th>Puesto</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $puestos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puestos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo $puestos->puesto; ?></td>
                <td>
                    <?php echo Form::open(['route' => ['puestos.destroy', $puestos->id], 'method' => 'delete']); ?>

                    <div class='btn-group'>
                        <a href="<?php echo route('puestos.show', [$puestos->id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="<?php echo route('puestos.edit', [$puestos->id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        <?php echo Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /var/www/html/flux/laravel/resources/views/puestos/table.blade.php ENDPATH**/ ?>