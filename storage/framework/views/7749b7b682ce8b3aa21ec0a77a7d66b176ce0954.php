<div class="table-responsive">
    <table class="table" id="departamentos-table">
        <thead>
            <tr>
                <th>Departamento</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $departamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $departamento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo $departamento->departamento; ?></td>
                <td>
                    <?php echo Form::open(['route' => ['departamentos.destroy', $departamento->id], 'method' => 'delete']); ?>

                    <div class='btn-group'>
                        <a href="<?php echo route('departamentos.show', [$departamento->id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="<?php echo route('departamentos.edit', [$departamento->id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        <?php echo Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /var/www/html/flux/laravel/resources/views/departamentos/table.blade.php ENDPATH**/ ?>